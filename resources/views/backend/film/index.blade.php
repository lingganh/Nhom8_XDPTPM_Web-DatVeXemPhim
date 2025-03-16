@extends('backend.dashboard.layout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style = "margin-top: 10px">
            <h2>Phim </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{'dashboard/index'}} ">Home</a>
                </li>
                <li class="active">
                    <strong> Film List </strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <section class="w3l-grids">
        <div class="grids-main py-5">
             <div class="container py-lg-3">

                <div class="w3l-populohny-grids">
                    @php
                        $upcomingMovies = $phims->where('trangThai', 'Sắp chiếu') ;
                    @endphp
                    @foreach ($phims as $phim)
                        <div class="item vhny-grid">
                            <div class="box16">
                                <a href="{{ route('film.index') }}">
                                    <figure>
                                        <img class="img-fluid" src="{{ $phim->Poster }}" alt="{{ $phim->tenPhim }}">
                                    </figure>
                                    <div class="box-content">
                                        <h3 class="title">{{ $phim->tenPhim }}</h3>
                                        <h4>
                                        <span class="post">
                                            <span class="fa fa-clock-o"></span> {{ $phim->thoiLuong }} Min
                                        </span>
                                         </h4>

                                        <div class="movie-buttons">


                                            <a href="" class="button btn-primary">Chi Tiết  </a>
                                            <a href="" class="button btn-primary">Sửa </a>
                                            <a href="" class="button btn-primary">Xóa </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
