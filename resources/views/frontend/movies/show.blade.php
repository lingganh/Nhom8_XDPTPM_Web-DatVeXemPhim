@extends('frontend.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <div class="max-w-6xl mx-auto px-4 py-8 mt-24">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2">
            <!-- Poster -->
            <div class="bg-black">
                <img src="{{ $film->Poster }}" alt="Poster phim" class="w-full h-full object-cover opacity-90">
            </div>

            <!-- Nội dung -->
            <div class="p-8 flex flex-col justify-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $film->tenPhim }}</h1>

                <div class="flex flex-wrap gap-2 mb-4">
                <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full">
                    Thời lượng: {{ $film->thoiLuong }} phút
                </span>
                    <span class="bg-pink-100 text-pink-800 text-sm font-semibold px-3 py-1 rounded-full">
                    Trạng thái: {{ $film->trangThai }}
                </span>
                </div>

                <p class="text-gray-700 leading-relaxed mb-4">
                    {{ $film->moTa }}
                </p>

                <!-- Nút mở modal -->
                @if($film->Trailer)
                    <button onclick="openModal()" class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Xem Trailer
                    </button>
                @endif

                <!-- Modal -->
                <div id="trailerModal" class="fixed inset-0 bg-black bg-opacity-60 hidden justify-center items-center z-50">
                    <div class="bg-white rounded-lg overflow-hidden w-full max-w-2xl shadow-xl relative">
                        <!-- Nút đóng -->
                        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl">&times;</button>

                        <!-- Nội dung video -->
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe id="trailerIframe" src="" class="w-full h-96" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        const modal = document.getElementById('trailerModal');
        const iframe = document.getElementById('trailerIframe');

        function openModal() {
            iframe.src = "{{ $film->Trailer }}";
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            iframe.src = ''; // reset video
        }
    </script>
    <h2 class="text-2xl font-semibold mb-6">Lịch Chiếu {{ $film->tenPhim }}</h2>

    @if($lichChieu->isNotEmpty())
        <div x-data="{ selectedDate: '{{ $lichChieu->keys()->first() }}' }">
            {{-- Dãy nút ngày --}}
            <div class="flex gap-2 mb-6">
                @foreach($lichChieu as $ngay => $buoi)
                    <button
                        class="px-4 py-2 rounded text-sm font-medium"
                        :class="selectedDate === '{{ $ngay }}' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800'"
                        @click="selectedDate = '{{ $ngay }}'"
                    >
                        {{ $ngay }}
                    </button>
                @endforeach
            </div>

            {{-- Hiển thị lịch của ngày được chọn --}}
            @foreach($lichChieu as $ngay => $buoi)
                <div x-show="selectedDate === '{{ $ngay }}'" class="mb-6" x-transition>
                    <h3 class="text-xl font-bold mb-2">Ngày {{ $ngay }}</h3>

                    @foreach(['Sáng', 'Chiều', 'Tối'] as $thoiDiem)
                        @if(isset($buoi[$thoiDiem]) && $buoi[$thoiDiem]->isNotEmpty())
                            <div class="mb-2">
                                <h4 class="font-semibold text-gray-700">{{ $thoiDiem }}</h4>
                                <div class="flex flex-wrap gap-3">
                                    @foreach($buoi[$thoiDiem] as $lich)
                                        <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium flex items-center gap-2">
                                        {{ \Carbon\Carbon::parse($lich->gioBD)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($lich->gioBD)->addMinutes($lich->thoiLuong)->format('H:i') }}
                                        <a href="#" class="text-green-600 font-semibold ml-2 hover:underline">Chọn ghế</a>
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">Không có lịch chiếu nào cho phim này.</p>
    @endif

@endsection
