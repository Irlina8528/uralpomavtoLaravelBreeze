<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="/img/Star-w.jpg" type="image/x-icon">
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    @vite(['resources/js/app.js',
     'resources/js/jquery.js', 
     'resources/js/bootstrap.min.js', 
     'resources/js/jasny-bootstrap.min.js',
     'resources/css/bootstrap.min.css',
     'resources/css/app.css'])
     <script>
        (function () {
    const header = document.querySelector("header");
    window.onscroll = () => {
        if (window.pageYOffset > 1) {
            header.classList.add("header__active");
        } else {
            header.classList.remove("header__active");
        }
    };
})();

     </script>
</head>