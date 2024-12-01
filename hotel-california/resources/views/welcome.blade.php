<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hotel California</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <style>
            html, body {
                background-image: url('/cdn/hotel-hero.png');
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
                color: white;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                width: 100%;
                margin: 0;
            }


            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .logout {
                color: white;
                padding: 0 25px;
                font-family: 'Nunito', sans-serif;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background: transparent;
                border: none;
                cursor: pointer;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('admin-room') }}">Admin panel</a>
                        @endif
                        <a href="{{ route('rooms') }}">Rooms</a>
                        <a href="{{ route('reservation') }}">Reservation</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="logout">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('rooms') }}">Rooms</a>
                        <a href="{{ route('reservation') }}">Reservation</a>
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Hotel California
                </div>

                <div class="links">
                    <a href="">About us</a>
                </div>
            </div>
        </div>
    </body>
</html>
