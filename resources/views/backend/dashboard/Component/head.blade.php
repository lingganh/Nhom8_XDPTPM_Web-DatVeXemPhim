<base href="{{env('APP_URL')}}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FIVE cinema | Dashboard  </title>

<link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/stylecustomize.css') }}" rel="stylesheet">

<script src="node_modules/switchery/switchery.min.js"></script>
<script>
    import Switchery from "switchery";

    $(document).ready(function() {
        var elem = document.querySelector('.js-switch');
        var init = new Switchery(elem, { color: '#1AB394' });
    });
</script>
