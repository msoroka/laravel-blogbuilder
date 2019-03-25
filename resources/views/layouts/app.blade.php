<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ $font }}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset($css) }}" rel="stylesheet">

    <style>
        body{
            font-family: '{{ $fontName }}', sans-serif !important;
        }
    </style>
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v3.2&appId=2230556416970326&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div id="app">
        @include($theme . '.navbar')
        @include('partials.errors')
        @include('flash::message')
        <main class="py-2">
            @yield('content')
        </main>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/navbar.js') }}" defer></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js" defer></script>
    <script async>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
</body>
</html>
