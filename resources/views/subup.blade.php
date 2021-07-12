<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="{{ asset('css/subup.css')}}">


  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chango&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('img/minilogo.png')}}">
  <script src="{{ asset('js/subup.js') }}" defer></script>

<body>
  <header>
    <div>
      <strong class="titolo">DATAJAZZ</strong>
    </div>

    <nav class="nav">
      <img id="logo" src="{{ asset ('img/logo.png')}}" />
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


    @if($nome == '')){
    <div class="sub_error">
      <h1>OPS!</h1>
      <h2>Qualcosa non va!</h2>
      <p>Prima di abbonarti devi effettuare il <a href="{{url('login')}}">login</a>!</p>
      <p>Non hai un account? <a href="./signup.php">Registrati</a>!</p>
    </div>
    }

    @else

    <h2>SUBSCRIBE!</h2>

    <form action="" method="post" id='carte'>
      <input type='hidden' name='_token' value='{{$csrf_token}}'>

      <p>Registra un altro<a href="{{url('payment')}}"> metodo di pagamento</a>.</p>
    </form>

    @if($error!='')
    <h2>{{$error}}</h2>
    @endif
    </div>

    @endif
  </section>

  <footer>

    <div>Matteo Jacopo Schembri</div>
    <div>1000012121</div>

  </footer>
</body>

</html>