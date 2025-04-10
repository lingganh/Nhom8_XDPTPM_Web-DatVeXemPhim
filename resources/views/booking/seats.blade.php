@extends('frontend.app')
@section('content')
    <br><br>
    <div class="container">


        <div class="flex">
            <div class="seating-area">
                <div class="screen">Màn Hình</div>
                <div class="seating-layout">
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
                        <div class="row" style="  gap: 12px;">
                            <span class="row-label">{{ $rowChar }}</span>
                            @for ($i = 1; $i <= 10; $i++)
                                @php
                                    $seat = $cols[$i] ?? null;
                                    $isBooked = in_array($seat ? $seat->idG : null, $gheDaDat);
                                @endphp
                                <button
                                    class="seat {{ $isBooked ? 'booked' : 'available' }} {{ isset($selectedSeats[$seat?->idG]) ? 'selected' : '' }}"
                                    data-ghe-id="{{ $seat ? $seat->idG : '' }}"
                                    {{ $isBooked || !$seat ? 'disabled' : '' }}
                                    @if ($seat) onclick="toggleSeat('{{ $seat->idG }}')" @endif
                                >
                                    {{ $seat ? substr($seat->idG, 1) : '' }}
                                </button>
                            @endfor
                        </div>
                    @endforeach

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
                        <span>Ghế đang chọn</span>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection


<script>
    const selectedSeats = {};
    const selectedSeatsDisplay = document.getElementById('selected-seats-display');
    const selectedSeatsSummary = document.getElementById('selected-seats-summary');
    const selectedSeatsInput = document.getElementById('selected-seats-input');
    const totalPriceElement = document.getElementById('total-price');
    const seatPrice = 75000; // Giá tiền mỗi ghế

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
            updateSelectedSeatsDisplay();
            updateTotalPrice();
        }
    }

    function updateSelectedSeatsDisplay() {
        const seatIds = Object.keys(selectedSeats);
        selectedSeatsDisplay.textContent = seatIds.join(', ');
        selectedSeatsSummary.textContent = seatIds.join(', ');
        selectedSeatsInput.value = JSON.stringify(seatIds);
    }

    function updateTotalPrice() {
        const numberOfSeats = Object.keys(selectedSeats).length;
        const total = numberOfSeats * seatPrice;
        totalPriceElement.textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total);
    }

    // Initialize total price to 0
    updateTotalPrice();
</script>
<style>
    .row {
        display: flex;

    }
</style>
