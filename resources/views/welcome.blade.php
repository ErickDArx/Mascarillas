<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/flickity-fullscreen@1/fullscreen.css">
    <link rel="stylesheet" href="{{ asset('../resources/css/flickity.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/center-simple.css') }}">
</head>

<body class="">

    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="img-fluid" src="{{ asset('../resources/css/logoSEO.png') }}" } alt="Logo Novedades NEA"
                    style="width: 2.5rem">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-virus m-2"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </nav>

    <div>
        <div class="carousel" data-flickity='{ "imagesLoaded": true, "percentPosition": false,"autoPlay": true, "fullscreen": true, "wrapAround": true, "lazyLoad": 1 }'>
        @foreach ($files as $item)
            <img src="{{$item->url}}" alt="">
        @endforeach
        </div>
    </div>

    {{-- Administrador --}}
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <form action="{{route('Agregar')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">
            <button type="submit" class="btn">Aceptar</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>

<script src="{{ asset('../resources/js/flickity.pkgd.min.js') }}"></script>
<script src="https://unpkg.com/flickity-fullscreen@1/fullscreen.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<script>
    var elem = document.querySelector('.main-carousel');
    var flkty = new Flickity(elem, {
    // options
    cellAlign: 'left',
    contain: true
    });

// element argument can be a selector string
//   for an individual element
var flkty = new Flickity('.main-carousel', {
    // options
});

var flkty = $('.carousel').flickity({
    fullscreen: true,
});

paceOptions = {
  // Disable the 'elements' source
  elements: false,

  // Only show the progress on regular and ajax-y page navigation,
  // not every request
  restartOnRequestAfter: false
}
</script>

</html>