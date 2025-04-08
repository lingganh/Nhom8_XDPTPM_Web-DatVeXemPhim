
<!doctype html>
<html lang="zxx">
@extends('frontend.layout.component.head')


<body>

<!-- header -->

@extends('frontend.layout.component.nav')
<!-- footer-66 -->
<header>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</header>


<div class="content">
    @yield('content')
</div>
@extends('frontend.layout.component.footer')


</body>
</html>
@extends('frontend.layout.component.script')
