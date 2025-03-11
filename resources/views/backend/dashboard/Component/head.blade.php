<base href="{{env('APP_URL')}}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FIVE cinema | Dashboard  </title>

<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">

<link href="backend/css/animate.css" rel="stylesheet">
<link href="backend/css/style.css" rel="stylesheet">
<link href="backend/css/stylecustomize.css" rel="stylesheet">
<link rel="stylesheet" href="node_modules/switchery/dist/switchery.min.css">
<script src="backend/js/jquery-3.1.1.min.js"></script>
 <link rel="stylesheet" href="node_modules/switchery/switchery.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<script src="node_modules/switchery/switchery.min.js"></script>
<script>
    import Switchery from "switchery";

    $(document).ready(function() {
        var elem = document.querySelector('.js-switch');
        var init = new Switchery(elem, { color: '#1AB394' });
    });
</script>
