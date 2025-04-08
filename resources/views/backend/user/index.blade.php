@extends('backend.dashboard.layout')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style="margin-top: 10px">
            <h2>Người Dùng </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{'dashboard.index'}} ">Home</a>
                </li>
                <li class="active">
                    <strong> User List </strong>
                </li>
            </ol>
        </div>

    </div>
    <br>
<br>
    <div class="container py-lg-2">
        <br><br>
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('user.index') }}" method="GET">
                    <input type="text" id="searchInput" class="form-control mb-2" placeholder="Tìm kiếm người dùng..." name="query" value="{{ request()->query('query') }}">
            </div>
            <div class="col-md-3">
                <button id="searchButton" type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>
                <a href="" class="btn btn-success mr5"   data-toggle="modal" data-target="#UserThemModal">  Thêm Mới <i class="fa fa-plus"></i></a>

            </div>
        </div>
    </div>
    <br><br> 
    <div class="user-cards-container">
            @foreach ($users as $item)
                <div class="col"> <div class="card">
                        <div class="img-fluid0">
                            <img src="{{ $item->image }}"
                                 alt="{{ $item->name}}"
                                 style="max-width: 120px ; height:120px; display: block;"
                                 onerror="this.onerror=null; this.src='https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg';" >
                            <br>
                            <div class="movie-buttons">
                                <button type="button" class="btn btn-success show-edit" data-toggle="modal" data-target="#phimSuaModal" >
                                    Sửa
                                </button>
                                <a>&ensp;</a>
                                <button  type="button" class="btn btn-danger delete "  data-toggle="modal"  data-target="#deleteConfirmationModal"  >Xóa  </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            @if ($item['description'])
                                <p class="card-text">{{ Str::limit($item['description'], 100) }}</p>
                            @endif
                            <p class="card-text"><small class="text-muted"><b>Phone:</b> {{ $item->phone ?? 'N/A' }}</small></p>
                            <p class="card-text"><small class="text-muted"><b>Address:</b> {{ $item->address ?? 'N/A' }}</small></p>
                            <p class="card-text"><small class="text-muted"><b>Birthday:</b> {{ $item->birthday ??'N/A' }}</small></p>
                            <p class="card-text"><small class="text-muted"><b>Email:</b> {{ $item->email ?? 'N/A' }}</small></p>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>

@endsection

