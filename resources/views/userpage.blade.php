<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/userpage.css')}}">

    <script src="{{ asset('js/userpage.js') }}" defer></script>
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



        <div class="output_container">
            <i class="material-icons"> account_circle </i>
            <p class="output_field"> {{$nome}} {{$cognome}}</p>
        </div>

        <div class="output_container">
            <i class="material-icons"> star_rate </i>
            <p class="output_field">Account: {{$tipo}} </p>
        </div>

        @if($tipo == 'Premium')
        <div class="output_container">
            <i class="material-icons"> event </i>
            <p class="output_field"> Giorni rimanenti: {{$giorni_rimanenti}} </p>
        </div>
        @endif


        <div class="output_container">
            <i class="material-icons"> download </i>
            <p class="output_field"> Numero di downloads: {{$n_downloads}} </p>
        </div>

        <div class="output_container">
            <i class="material-icons"> lock </i>
            <a class="output_field" href="{{url('changePassword')}}">Modifica password</a>
        </div>

        @if($tipo == 'Premium')
        <div class="output_container">
            <i class="material-icons"> delete_forever </i>
            <a class="output_field"><button id="myBtn">Disdici abbonamento</button></a>
        </div>
        @endif



        <div class="output_container">
            <i class="material-icons"> logout </i>
            <a class="output_field" href="{{url('logout')}}">Logout</a>
        </div>


        <div id="myModal" class="modal">

            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Vuoi veramente disdire l'abbonamento?</p>
                <div class="output_container">
                    <form action="userpage" method="post">
                        <input type="submit" id="btn_disdici" name="submit" class="btn" value="Disdici">
                        <input type='hidden' name='_token' value='{{$csrf_token}}'>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <footer>

        <div>Matteo Jacopo Schembri</div>
        <div>1000012121</div>

    </footer>
</body>

</html>