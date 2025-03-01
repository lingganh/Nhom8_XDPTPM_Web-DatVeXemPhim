<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HashPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passwords:hash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hash all plain text passwords in admin table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Lấy tất cả người dùng từ bảng admin
        $users = DB::table('admin')->get();

        foreach ($users as $user) {
            // Kiểm tra xem mật khẩu đã được hash hay chưa (bắt đầu với $2y$ là bcrypt hash)
            if (!Hash::needsRehash($user->password)) {
                $this->info("Password for user {$user->email} is already hashed.");
                continue;
            }

            // Mã hóa (bcrypt) lại mật khẩu
            $hashedPassword = Hash::make($user->password);

            // Cập nhật lại trong cơ sở dữ liệu
            DB::table('admin')
                ->where('id', $user->id) // Hoặc trường ID tương ứng
                ->update(['password' => $hashedPassword]);

            $this->info("Password for user {$user->email} has been rehashed.");
        }

        $this->info('Password hash process completed!');
    }
}
