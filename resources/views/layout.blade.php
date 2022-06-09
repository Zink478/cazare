<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <title>Administrarea căminelor - UTM</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

{{--    <link rel="icon" href="images/fevicon.png" type="image/gif" />--}}

    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">

    <link type="image/x-icon" href="https://utm.md/wp-content/uploads/2017/04/LOGO_UTM_2-1030x541.jpg" rel="shortcut icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body class="main-layout">

{{--<div class="loader_bg">--}}
{{--    <div class="loader"><img src="{{asset('images/loading.gif')}}" alt="#" /></div>--}}
{{--</div>--}}

<header>

    <div class="head-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="email"> <a href="#">Email : admin.camine@utm.com</a> </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="icon"> <i> <a href="https://www.facebook.com/UTMoldova"><img src="{{asset('icon/facebook.png')}}"></a></i> <i>
                            <a href="https://twitter.com/utm_md"><img src="{{asset('icon/Twitter.png')}}"></a></i> </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="contact"> <a href="#">Contact :  (+373)068-45-25</a> </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" style="font-size: 30px" href={{route('home')}}>Căminul 1 UTM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="font-size: 20px">
                <li class="active nav-item"> <a class="nav-link" href="{{route('home')}}">Acasă</a> </li>
                <li class="nav-item active"> <a class="nav-link" href="{{ route('cazare') }}">Cazare</a> </li>
                <li class="nav-item active"> <a class="nav-link" href="{{ route('panou_informativ') }}">Panou informativ</a> </li>
                <li class="nav-item active"> <a class="nav-link" href="{{route('payments')}}">Taxa de cazare</a> </li>
                <li class="nav-item active"> <a class="nav-link" href="{{ route('contacts') }}">Contactează-ne</a> </li>
                <li class="nav-item active"> <a class="nav-link" href="{{route('adminhome')}}">Admin</a> </li>

                @if(auth()->guest())
                    <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">Register</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Login</a> </li>

                    @else
                    <li>
                        <form action="{{url('/logout')}}" method="post">
                            {!! csrf_field() !!}
                            <button type="submit">Log Out</button>
                        </form>
                    </li>
                    <li><a class="nav-link" href="{{route('profile')}}">Profil</a></li>
                @endif
{{--                @if(auth()->user())--}}
{{--                <li>--}}
{{--                    <form action="{{url('/logout')}}" method="post">--}}
{{--                        {!! csrf_field() !!}--}}
{{--                        <button type="submit">logout</button>--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--                    <li><a class="nav-link" href="{{route('profile')}}">Profile</a></li>--}}
{{--                    @endif--}}
            </ul>
        </div>
    </nav>

    @yield('main_content')

<footer>
    <div class="copyright">
        <div class="container">
            <p>Toate drepturile rezervate de către <a href="https://www.facebook.com/dragos.cojocaru.127">Cojocaru Dragoş</a></p>
        </div>
    </div>
</footer>

    <script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('js/plugin.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

</body>
</html>

