<?php

namespace App\Jobs;

use App\Models\Ghe;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class HoldSeatJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $showtimeId;
    protected $seatCode;
    protected $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($showtimeId, $seatCode, $userId = null)
    {
        $this->showtimeId = $showtimeId;
        $this->seatCode = $seatCode;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            DB::beginTransaction();

            //  khóa bản ghi các ghế
            $ghe = Ghe::where('PC_id', function($query) {
                $query->select('PC_id')
                    ->from('lich_chieu')
                    ->where('idLC', $this->showtimeId);
            })
                ->where('idG', $this->seatCode)
                ->lockForUpdate()
                ->first();

            if (!$ghe) {
                DB::rollBack();
                Log::warning("Không thể giữ ghế {$this->seatCode} cho suất chiếu {$this->showtimeId}: Ghế đã được đặt hoặc không tồn tại.");
                return;
            }

            // Kiểm tra xem đã có giữ chỗ tạm thời cho ghế này chưa và còn hiệu lực không
            $existingReservation = TemporaryReservation::where('showtime_id', $this->showtimeId)
                ->where('seat_code', $this->seatCode)
                ->where('expires_at', '>', now())
                ->first();

            if ($existingReservation) {
                DB::rollBack();
                Log::warning("Không thể giữ ghế {$this->seatCode} cho suất chiếu {$this->showtimeId}: Ghế đang được giữ tạm thời.");
                return;
            }

            // Xóa giữ chỗ tạm thời cũ nếu đã hết hạn
            TemporaryReservation::where('showtime_id', $this->showtimeId)
                ->where('seat_code', $this->seatCode)
                ->where('expires_at', '<=', now())
                ->delete();

            // Tạo giữ chỗ tạm thời mới
            TemporaryReservation::create([
                'user_id' => $this->userId,
                'showtime_id' => $this->showtimeId,
                'seat_code' => $this->seatCode,
                'expires_at' => now()->addMinutes(10), // Thời gian giữ chỗ tạm thời (ví dụ: 10 phút)
            ]);

            DB::commit();
          //  Log::info("Ghế {$this->seatCode} đã được giữ tạm thời cho suất chiếu {$this->showtimeId} bởi user {$this->userId ?? 'guest'}.");

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Lỗi khi giữ ghế {$this->seatCode} cho suất chiếu {$this->showtimeId}: " . $e->getMessage());
        }
    }
}
