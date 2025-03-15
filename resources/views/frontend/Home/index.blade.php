@extends('frontend.app')
@section('content')
    <section class="w3l-main-slider position-relative" id="home">
        <div class="companies20-content">
            <div class="owl-one owl-carousel owl-theme">
                @foreach ($phims as $phim)
                    <div class="item">
                        <li>
                            <div class="slider-info banner-view bg" style="background-image: url('{{ $phim->imgBanner }}');">
                                <div class="banner-info">
                                    <h3>{{ $phim->tenPhim }}</h3>
                                    <p>{{ $phim->moTa }}</p>
                                    <a href="#small-dialog{{ $loop->iteration }}" class="popup-with-zoom-anim play-view1">
                                    <span class="video-play-icon">
                                        <span class="fa fa-play"></span>
                                    </span>
                                        <h6>Watch Trailer</h6>
                                    </a>
                                    <div id="small-dialog{{ $loop->iteration }}" class="zoom-anim-dialog mfp-hide">
                                        <iframe width="560" height="315" src="{{$phim->Trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    <section class="w3l-grids">
        <div class="grids-main py-5">
            <div class="container py-lg-3">
                <div class="headerhny-title">
                    <div class="w3l-title-grids">
                        <div class="headerhny-left">
                            <h3 class="hny-title">Phim nổi tiếng</h3>
                        </div>
                        <div class="headerhny-right text-lg-right">
                            <h4><a class="show-title" href="{{ route ('film.index') }}">Tất cả chương trình</a></h4>
                        </div>
                    </div>
                </div>
                <div class="w3l-populohny-grids">
                    @foreach ($phims as $phim)
                        <div class="item vhny-grid">
                            <div class="box16">
                                <a href="{{ route ('film.index') }}">
                                    <figure>
                                        <img class="img-fluid" src="{{ $phim->Poster }}" alt="{{ $phim->tenPhim }}">
                                    </figure>
                                    <div class="box-content">
                                        <h3 class="title">{{ $phim->tenPhim }}</h3>
                                        <h4>
                            <span class="post">
                                <span class="fa fa-clock-o"></span> {{ $phim->thoiLuong }} Min
                            </span>
                                            <span class="post fa fa-heart text-right"></span>
                                        </h4>
                                    </div>
                                    <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    <div>
 @endsection
