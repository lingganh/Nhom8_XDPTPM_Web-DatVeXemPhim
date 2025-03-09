<!DOCTYPE html>
<html>

<head>
    @include('backend.dashboard.Component.head')
</head>


<body>
    @include('backend.dashboard.Component.sidebar')
     <div id="page-wrapper" class="gray-bg">

    @include('backend.dashboard.Component.nav')

         <div class="content">
             @yield('content')
         </div>
    @include('backend.dashboard.Component.footer')
    @include('backend.dashboard.Component.script')

</body>
</html>
