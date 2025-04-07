@extends('frontend.app')
@section('content')
    <h1>Danh sách phim</h1>
    @foreach($films as $film)


            <div class="movie-card">
                <a href="{{ route('frontend.movies.show', ['M_id' => $film->M_id]) }}">
                    <img src="{{ $film->Poster }}"  width="200">
                    <h3>{{ $film->tenPhim }}</h3>
                </a>
            </div>
    @endforeach
@endsection

