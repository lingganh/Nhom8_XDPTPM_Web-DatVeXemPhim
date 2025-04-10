@extends('backend.dashboard.layout')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style = "margin-top: 10px">
            <h2>Vé </h2>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{'dashboard/index'}}">Home</a>
                </li>
                <li class="active">
                    <strong> Ticket </strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>



    <div class="grids-main py-5">
        <div class="container py-lg-3">
            <div class="container py-lg-3">
                <br><br>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <form action=" " method="GET" class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm vé..." name="query" value="{{ request()->query('query') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="date" id="dateFilter" class="form-control" name="date" value="{{ request()->query('date') }}">
                            </div>
                    </div>
                    <div class="col-md-3">
                        <button id="searchButton" type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </form>
                    </div>

                </div>
                <div id="searchResults" class="w3l-populohny-grids">
                </div>

            </div>
        </div>
    </div>

<br>

    <div class="ticket-horizontal">
        <div class="left-section">
            <div class="header-left">FIVE Cinema</div>
            <div class="movie-info">
                <div class="title">HOW I MET YOUR MOTHER</div>
                <div class="label">MOVIE</div>
            </div>
            <div class="name-info">
                <div class="name">VLADIMIR KUDINOV</div>
                <div class="label">NAME</div>
            </div>
            <div class="session-info">
                <div class="seat-time">
                    <div class="value">156</div>
                    <div class="label">SEAT</div>
                </div>
                <div class="seat-time time">
                    <div class="value">12:00</div>
                    <div class="label">TIME</div>
                </div>
            </div>
        </div>
        <div class="separator0"></div>
        <div class="right-section">
            <div class="seat-number">156</div>
            <div class="seat-label">SEAT</div>
            <div class="barcode">

                <div>14635623</div>


            </div>
        </div>
    </div>


    </div>
@endsection
