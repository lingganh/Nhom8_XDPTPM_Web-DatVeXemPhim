<!doctype html>
<html lang="zxx">
<head>
    <title>Five Star</title>
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

@livewireScripts
@include('client.layout.component.script')

</body>
</html>
