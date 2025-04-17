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
    <div class="rounded-2xl shadow-md p-6 mt-6 max-w-4xl mx-auto" style="background-color: #FFFFFF;">
        <h2 class="text-2xl font-bold mb-6 text-center" style="color: black; font-weight: bold;">Lịch Chiếu {{ $film->tenPhim }}</h2>

        @if($lichChieu->isNotEmpty())
            <div x-data="{ selectedDate: '{{ $lichChieu->keys()->first() }}' }" class="max-w-4xl mx-auto">
                <!-- Tabs ngày chiếu -->
                <div class="flex flex-wrap justify-center gap-2 mb-6">
                    @foreach($lichChieu as $ngay => $lichTrongNgay)
                        <button
                            class="px-4 py-2 rounded text-sm font-medium"
                            :class="selectedDate === '{{ $ngay }}' ? 'bg-pink-600 text-white' : 'bg-gray-100 text-gray-800'"
                            @click="selectedDate = '{{ $ngay }}'">
                            {{ $ngay }}
                        </button>
                    @endforeach
                </div>
                <!-- Danh sách giờ chiếu -->
                @foreach($lichChieu as $ngay => $lichTrongNgay)
                    <div x-show="selectedDate === '{{ $ngay }}'" x-transition>
                        <div class="space-y-4">
                            @foreach(['Sáng', 'Chiều', 'Tối'] as $buoi)
                                @if($lichTrongNgay[$buoi]->isNotEmpty())
                                    <div>
                                        <div class="font-semibold text-gray-600 mb-1">{{ $buoi }}</div>
                                        <div class="flex flex-wrap gap-3">
                                            @foreach($lichTrongNgay[$buoi] as $lich)
                                                <a href="#" class="flex items-center bg-gray-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-100 transition">
                                                    {{ \Carbon\Carbon::parse($lich->gioBD)->format('H:i') }} -
                                                    {{ \Carbon\Carbon::parse($lich->gioBD)->addMinutes($lich->thoiLuong)->format('H:i') }}
                                                    <span class="text-green-600 ml-2">Đặt vé</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    @else
        <p class="text-center text-gray-600">Không có lịch chiếu nào cho phim này.</p>
        @endif
        </div>
@endsection
