<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="{{ url('../resources/css/transcriptions.css')}}">
  <script src="{{url('../resources/js/transcriptions.js')}}" defer="true"></script>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chango&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
  <header>
    <div>
      <strong class="titolo">DATAJAZZ</strong>
    </div>

    <nav class="nav">
      <img id="logo" src="{{ url('../resources/img/logo.png')}}" />
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

    @if(session('id_session')!=null)



    <div class="table_container">

      <div id="ricerca">
        <input type="text" id="searchbar" placeholder="Search..." onkeyup="search()">
      </div>


      <table id=table>

        <tr class="header">
          <th>Titolo</th>
          <th>Album</th>
          <th>Strumento</th>
          <th>Preview del brano</th>
          <th>Download</th>
        </tr>



        @foreach($solos_result as $index=> $res)

        <tr class="song_wrapper">
          <td class="titolo_brano" id="livesearch">{{$res['titolo_traccia']}}</td>
          <td class="titolo_album">{{$res['album']}}</td>
          <td>{{$res['strumento']}}</td>
          <td>
            <audio class="audio" controls>
              <source src="" type="audio/mp3">
            </audio>
          </td>
          <td>
            <form action="" method="POST">
              <button type="submit" name="download" class="material-icons"> download </button>
              <input type="hidden" , name="id_solo" value="{{$res['id_solo']}}">
              <input type='hidden' name='_token' value='{{$csrf_token}}'>
            </form>
          </td>
        </tr>


        @if($error!='')
        <h2>{{$error}}</h2>
        @endif

        @endforeach


      </table>

    </div>


    @else

    <div>
      <h1>OPS!</h1>
      <p>Prima di accedere a questa sezione devi effettuare il <a href="{{url('login')}}">login</a>!</p>
      <p>Non hai un account? <a href="{{url('signup')}}">Iscriviti</a>!</p>
    </div>


    @endif


  </section>

  <footer>

    <div>Matteo Jacopo Schembri</div>
    <div>1000012121</div>

  </footer>
</body>

</html>