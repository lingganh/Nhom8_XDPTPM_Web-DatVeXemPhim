@extends('layouts.app')

@section('content')
    <!-- Movie details  -->
    <section id="movie-details" class="p-6 max-w-screen-lg mx-auto">
        <div
            class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-lg shadow-lg w-full max-w-screen-lg mx-auto md:flex-row md:max-w-7xl dark:border-gray-700 dark:bg-gray-800">
            <img class="object-cover w-full rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{ $Phim->imgBanner }}"
                 alt="{{ $Phim->tenPhim }}" />
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $Phim->tenPhim }}
                </h5>
                <div class="flex flex-wrap my-3">
                    <x-movie-info :movie="$Phim" />
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ $Phim->moTa }}
                </p>
            </div>
        </div>
    </section>
@endsection
