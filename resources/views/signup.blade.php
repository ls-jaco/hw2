<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css')}}">


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
        <div class="signup_container">
            <h2>SIGN UP!</h2>
            <p>Iscriviti, è gratis!</p>

            <form action="" method="post">
                <input type='hidden' name='_token' value='{{$csrf_token}}'>

                <div class="input_container">
                    <i class="material-icons"> badge </i>
                    <input type="text" placeholder="Nome" name="nome" id="nome" text-transform="capitalize" class="input_field" required>
                    <script>
                        document.getElementById("nome").addEventListener("keypress", function(e) {
                            if (this.selectionStart == 0) {
                                // uppercase first letter
                                forceKeyPressUppercase(e);
                            }
                        }, false);
                    </script>
                </div>
                <div class="input_container">
                    <i class="material-icons"> badge </i>
                    <input type="text" placeholder="Cognome" name="cognome" id="cognome" class="input_field" required>
                </div>
                <div class="input_container">
                    <i class="material-icons"> alternate_email </i>
                    <input type="email" placeholder="Email" name="email" class="input_field" required>
                </div>
                <div class="input_container">
                    <i class="material-icons"> code </i>
                    <input type="text" placeholder="Codice fiscale" name="cf" id="cf" maxlength="16" class="input_field" required onkeyup="MakeMeUpper(this)">
                </div>
                <div class="input_container">
                    <i class="material-icons"> event </i>
                    <input type="text" placeholder="Data di nascita" onfocus="(this.type='date')" name="data_nascita" class="input_field" required>
                </div>
                <div class="input_container">
                    <i class="material-icons"> lock </i>
                    <input type="password" placeholder="Password" id="password" maxlength="16" name="password" class="input_field" required>
                    <i class="far fa-eye" id="togglePassword"></i>
                </div>
                <div class="input_container">
                    <i class="material-icons"> lock </i>
                    <input type="password" placeholder="Conferma password" id="confirm_password" maxlength="16" name="confirm_password" class="input_field" required>
                    <i class="far fa-eye" id="toggleConfirmPassword"></i>
                </div>


                <div class="input_container">
                    <input type="submit" name="submit" class="btn" value="Submit">
                </div>

                <p>Hai già un account? Effettua il <a href="{{url('login')}}">login</a>!</p>
            </form>

            @if($error!='')
            <h2>{{$error}}</h2>
            @endif
        </div>


    </section>

    <footer>

        <div>Matteo Jacopo Schembri</div>
        <div>1000012121</div>

    </footer>
</body>

</html>