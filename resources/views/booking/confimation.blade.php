@extends('client.app')
@section('content')


    <div class="box">


        <form action="{{route('booking.payment')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success mt-4">Tiến hành Thanh toán QR Code</button>

        </form>
    </div>
@endsection
