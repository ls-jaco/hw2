<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Change Password</title>
    <link rel="stylesheet" href="{{ url('../resources/css/signup.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chango&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
    <script src='../scripts/signup.js' type="text/javascript" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
                <a class= 'nav-link' href="{{url('userpage')}}"> {{$nome}}</a>
            @else
                <a class="nav-link" href="{{url('login')}}">LOGIN</a>
            @endif
        </div>
      </nav>

    </header>

    <section>


        <h2>Modifica password</h2>
        <form action="" method="post">
        <input type='hidden' name='_token' value='{{$csrf_token}}'>

            <div class="input_container">
                <i class="material-icons"> delete_sweep </i>
                <input type="password" placeholder="Password attuale" maxlength="16" name="old_password" class="input_field" required>
            </div>
            <div class="input_container">
                <i class="far fa-eye" id="toggleConfirmPassword"></i>
                <i class="material-icons"> lock </i>
                <input type="password" placeholder="Nuova password" maxlength="16" name="new_password" class="input_field" required>
            </div>
            <div class="input_container">
                <i class="far fa-eye" id="toggleConfirmPassword"></i>
                <i class="material-icons"> lock </i>
                <input type="password" placeholder="Conferma password" maxlength="16" name="confirm_password" class="input_field" required>
            </div>
            <div class="input_container">
                <input type="submit" name="submit" class="btn" value="Submit">
            </div>

        </form>

        @if($error!='')
        <h2>{{$error}}</h2>
        @endif

    </section>

    <footer>

        <div>Matteo Jacopo Schembri</div>
        <div>1000012121</div>

    </footer>
</body>

</html>