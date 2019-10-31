<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app_name', 'MyGallery')}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
    <link rel="stylesheet" href="{{ mix('/css/front.css') }}">
    <link rel="icon" type="image/png" href="/img/favicon.png">
</head>
<body>
<div class="wrapper">

    @include('layouts.__FrontHeader')

    @include('flashMassage')

    @yield('content')

    @include('layouts.__FrontFooter')

</div>
</body>

<script src="{{ mix('/js/admin.js') }}"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckfinder/ckfinder.js"></script>
<script>
    $(document).ready(function(){
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor( editor );
    })
</script>


</html>