<!doctype html>
<html lang="zxx">
<head>
    <title>FIVE Star</title>
    @include('client.layout.component.head')
    @livewireStyles

</head>
<body>

@include('client.layout.component.nav')

<header></header>


<div class="content">
    @yield('content')
</div>


@include('client.layout.component.footer')



</body>
@include('client.layout.component.script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts

</html>
