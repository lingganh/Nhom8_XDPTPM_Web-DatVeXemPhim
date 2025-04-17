<!doctype html>
<html lang="zxx">
<head>
    @include('frontend.layout.component.head')
    @livewireStyles
    @livewireScripts
    @include('frontend.layout.component.script')
</head>
<body>

@include('frontend.layout.component.nav')

<header></header>


<div class="content">
    @yield('content')
</div>


@include('frontend.layout.component.footer')



</body>
</html>
