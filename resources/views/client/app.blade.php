<!doctype html>
<html lang="zxx">
@extends('client.layout.component.head')
@extends('client.layout.component.script')

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<body>

<!-- header -->

@extends('client.layout.component.nav')
<!-- footer-66 -->
<header>


</header>


<div class="content">
    @yield('content')
</div>


@extends('client.layout.component.footer')


</body>
</html>
