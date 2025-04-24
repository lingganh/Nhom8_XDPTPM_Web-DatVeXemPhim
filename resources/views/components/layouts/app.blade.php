<!doctype html>
<html lang="zxx">
<head>
    <title>Five Star</title>
    @livewireStyles    @include('client.layout.component.head')


    @livewireScripts
    @include('client.layout.component.script')
</head>
<body>

@include('client.layout.component.nav')

<header></header>

<div class="content">
    @yield('content')
</div>

@include('client.layout.component.footer')



</body>
</html>
