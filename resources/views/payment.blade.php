<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/payment.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chango&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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


        <div class="sub_container">
            <h2>SUBSCRIBE!</h2>
            <p>Aggiungi un metodo di pagamento</p>

            <form action="" method="post">
                <input type='hidden' name='_token' value='{{$csrf_token}}'>


                <div class="input_container">
                    <i class="material-icons"> badge </i>
                    <input type="text" name="n_carta" id="n_carta" maxlength="16" class="input_field" placeholder="Numero carta" required>
                </div>
                <div class="input_container">
                    <i class="material-icons"> credit_card </i>
                    <input type="text" name="proprietario" id="proprietario" class="input_field" placeholder="Proprietario" required>
                </div>
                <div class="input_container">
                    <i class="material-icons"> lock </i>
                    <input type="password" name="CVV" maxlength="3" class="input_field" placeholder="CVV" required>
                </div>
                <div class="input_container">
                    <i class="material-icons"> event </i>
                    <input type="text" onfocus="(this.type='date')" name="data_scadenza_carta" class="input_field" id="data_scadenza_carta" placeholder="Data di scadenza" required>
                </div>

                <div class="input_container">
                    <input type="submit" name="submit" class="btn" value="Submit">
                </div>
            </form>

        </div>


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