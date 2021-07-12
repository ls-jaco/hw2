<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <meta charset="UTF-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="shortcut icon" href="{{ asset('img/minilogo.png')}}">

  <title>Datajazz</title>

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chango&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>

  <header class="page-header">

    <div>
      <strong class="titolo">DATAJAZZ</strong>
    </div>

    <nav class="nav">
      <img id="logo" src="{{ asset('img/logo.png')}}" />
      <div id="links">
        <a class="nav-link" href="{{url('home')}}">HOME</a>
        <a class="nav-link" href="{{url('transcriptions')}}">TRANSCRIPTIONS</a>
        <a class="nav-link" href="{{url('subup')}}">SUBSCRIBE</a>

        @if($nome != '')
        <a class='nav-link' href="{{url('userpage')}}"> {{$nome}}</a>
        @else
        <a class="nav-link" href="{{url('login')}}">LOGIN</a>
        @endif
      </div>
    </nav>

  </header>

  <section>

    <div class="contenuti">
      <div class="blocco_contenuti">
        <img src="{{ asset('img/abd.jpg')}}" />

        <a class="link-button" href="{{url('transcriptions')}}">TRANSCRIPTIONS</a>
        <p>Controlla la lista delle trascrizioni!</p>
      </div>

      <div class="blocco_contenuti">
        <img src="{{ asset('img/lat.jpg')}}" />
        <a class="link-button" href="{{url('subup')}}">SUBSCRIBE</a>
        <p>Abbonati al sito per avere download illimitati!</p>
      </div>
    </div>

  </section>

  <footer>

    <div>Matteo Jacopo Schembri</div>
    <div>1000012121</div>

  </footer>
</body>

</html>