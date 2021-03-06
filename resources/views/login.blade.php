<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chango&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('img/minilogo.png')}}">
</head>

<body>
    <header>
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
        <div class="container_login">
            <h2>Login</h2>

            <form action="" method="post">
                <input type='hidden' name='_token' value='{{$csrf_token}}'>
                <div class="input_container">
                    <i class="material-icons"> email </i>
                    <input placeholder="Email" type="email" name="email" class="input_field" required>
                </div>
                <div class="input_container">
                    <i class="material-icons"> lock </i>
                    <input placeholder="Password" type="password" name="password" class="input_field" required>
                </div>
                <div class="input_container">
                    <input type="submit" name="submit" class="btn" value="Submit">
                </div>
                @if($error!='')
                <h2>{{$error}}</h2>
                @endif
                <p>Non hai un account? <a href="{{url('signup')}}">Registrati</a>!</p>


            </form>
        </div>
    </section>

    <footer>

        <div>Matteo Jacopo Schembri</div>
        <div>1000012121</div>

    </footer>

</body>

</html>