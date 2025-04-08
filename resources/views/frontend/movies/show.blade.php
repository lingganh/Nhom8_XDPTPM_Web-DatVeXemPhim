@extends('frontend.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
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
<h2>LỊCH CHIẾU/MOVIESHOWTIME</h2>

@endsection
