<base href="{{env('APP_URL')}}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FIVE cinema | Dashboard  </title>

<link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('admin/css/stylecustomize.css') }}" rel="stylesheet">

<script src="node_modules/switchery/switchery.min.js"></script>
<script>
    import Switchery from "switchery";

    $(document).ready(function() {
        var elem = document.querySelector('.js-switch');
        var init = new Switchery(elem, { color: '#1AB394' });
    });
</script>
