@extends('frontend.app')
@section('content')
    <br><br><br><br><br><br>
    <div class="container">
        <div class="flex">
            <div class="seating-area">
                <div style="display: flex; align-items: flex-start; margin-bottom: 50px;">
                    <div class="screen">Màn Hình</div>
                    <div class="box" style="margin-left: 100px;">
                        <div>
                            <h2 class="text-xl text-gray-700 mb-2">Phim: {{ $lichChieu->phim->tenPhim }}</h2>
                            <p class="text-gray-600 mb-2">Thời gian: {{ \Carbon\Carbon::parse($lichChieu->gioBD)->format('H:i d/m/Y') }}</p>
                            <p class="text-gray-600 mb-4">Phòng chiếu: {{ $phongChieu->ten_phong ?? $lichChieu->PC_id }}</p>

                                <h3 class="text-lg font-semibold mb-2">Thông tin đặt vé</h3>
                                <p>Ghế đã chọn: <span id="selected-seats-summary"></span></p>
                                <p>Giá mỗi ghế: <span id="seat-price">{{ number_format(75000) }} VNĐ</span></p>
                                <p>Tổng tiền: <span id="total-price">0 VNĐ</span></p>

                            <form action="{{ route('booking.select-food') }}" method="GET" class="mt-4" id="booking-form">
                                    @csrf
                                    <input type="hidden" name="lich_chieu_id" value="{{ $lichChieu->idLC }}">
                                    <input type="hidden" name="selected_seats" id="selected-seats-input" value="">
                                    <button type="submit" class="screen">Tiếp tục</button>
                                </form>

                        </div>
                    </div>

                </div>
                <div class="seating-layout" style="margin-top:-350px">
                    @php
                        $rows = [];
                        foreach ($allSeats as $seat) {
                            preg_match('/([A-Z]+)(\d+)/', $seat->idG, $matches);
                            $rowChar = $matches[1];
                            $colNum = intval($matches[2]);
                            if (!isset($rows[$rowChar])) {
                                $rows[$rowChar] = [];
                            }
                            $rows[$rowChar][$colNum] = $seat;
                        }
                        ksort($rows);
                    @endphp

                    @foreach ($rows as $rowChar => $cols)
                        <div class="row" style="display: flex; gap: 12px; align-items: center;">
                            <span class="row-label">{{ $rowChar }}</span>
                            @for ($i = 1; $i <= 10; $i++)
                                @php
                                    $seat = $cols[$i] ?? null;
                                    $isBooked = in_array($seat ? $seat->idG : null, $gheDaDat);
                                @endphp
                                <button
                                    class="seat {{ $isBooked ? 'booked' : 'available' }} {{ isset($selectedSeats[$seat?->idG]) ? 'selected' : '' }} {{ !$seat ? 'empty' : '' }}"
                                    data-ghe-id="{{ $seat ? $seat->idG : '' }}"
                                    {{ $isBooked || !$seat ? 'disabled' : '' }}
                                    @if ($seat) onclick="toggleSeat('{{ $seat->idG }}')" @endif
                                >
                                    {{ $seat ? substr($seat->idG, 1) : '' }}
                                </button>
                            @endfor
                        </div>
                    @endforeach
                </div>
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #fff;"></div>
                        <span>Ghế trống</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #dc3545;"></div>
                        <span>Ghế đã đặt</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #28a745;"></div>
                        <p id="selected-seats-summary">Ghế đã chọn <p >             </div>
                </div>
            </div>


            </div>
        </div>
        </div>
    </div>


            </div>
        </div>
    </div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    const selectedSeats = {};
    const selectedSeatsSummary = document.getElementById('selected-seats-summary');
    const selectedSeatsInput = document.getElementById('selected-seats-input');
    const totalPriceElement = document.getElementById('total-price');
    const seatPrice = 75000;

    function toggleSeat(seatId) {
        const seatButton = document.querySelector(`.seat[data-ghe-id="${seatId}"]`);
        if (seatButton) {
            if (selectedSeats[seatId]) {
                delete selectedSeats[seatId];
                seatButton.classList.remove('bg-orange-500', 'hover:bg-orange-600', 'selected');
                seatButton.classList.add('bg-green-500', 'hover:bg-green-600');
            } else {
                selectedSeats[seatId] = true;
                seatButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                seatButton.classList.add('bg-orange-500', 'hover:bg-orange-600', 'selected');
            }
            console.log(seatId);
            updateSelectedSeatsDisplay();
            updateTotalPrice();
        }
    }

    function updateSelectedSeatsDisplay() {
        const seatIds = Object.keys(selectedSeats);
        console.log('seatIds:', seatIds);
        selectedSeatsSummary.textContent = seatIds.join(', ');
        selectedSeatsInput.value = JSON.stringify(seatIds);
    }

    function updateTotalPrice() {
        const numberOfSeats = Object.keys(selectedSeats).length;
        const total = numberOfSeats * seatPrice;
        totalPriceElement.textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total);
    }
     updateTotalPrice();
</script>
<style>
    .row {
        display: flex;

        align-items: center;
    }

</style>
@endsection
