<!doctype html>
<html lang="zxx">
<head>
    @include('frontend.layout.component.head')
    @livewireStyles
</head>
<body>

@include('frontend.layout.component.nav')

<header></header>

<div class="content">
    @yield('content')
</div>

@include('frontend.layout.component.footer')

@livewireScripts
@include('frontend.layout.component.script')

</body>
</html>
