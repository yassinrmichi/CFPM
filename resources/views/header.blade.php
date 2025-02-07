<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>CFPM</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="shortcut icon" href="{{ asset('includes/images/CFPMLogo.jpg') }}">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <link href="/assets/css/main.css" rel="stylesheet">
</head>
<style>

</style>
<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top w-100 mb-5">
    <div class="header-container container d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">CFPM</h1>
        </a>

        <!-- Navigation -->
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{route('index')}}">Home</a></li>
                <li><a href="{{route('about')}}">About</a></li>
                <li><a href="{{route('Filiere')}}">Filières</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                @auth
                    @if(auth()->user()->role == 'stagiaire')
                        <li><a href="{{ url('espaceStagaire') }}">Espace stagiaire</a></li>
                    @elseif(auth()->user()->role == 'formateur')
                        <li><a href="{{ url('espaceFormateur') }}">Espace formateur</a></li>
                    @elseif(auth()->user()->role == 'GlobalAdmin')
                        <li><a href="{{ route('GlobalAdmins.EspaceGlobalAdmin') }}">Espace Administration Global</a></li>
                    @elseif(auth()->user()->role == "user")
                      <li><a href="inscrireformation">Inscrire à une formation</a></li>
                    @endif
                @endauth
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <!-- Dropdown utilisateur si connecté -->
        @auth
        <div class="dropdown">
          <div class="dropdown-toggle h6 text-dark"  id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Str::before(auth()->user()->email, '@') }}
          </div>
          <ul class="dropdown-menu" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i>Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                <i class="fa fa-sign-out-alt"></i>Se déconnecter
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>

          </ul>
        </div>
        @endauth

        @guest
        <div class="connexion_option d-flex align-items-center justify-content-center" data-aos="fade-in">
            <form action="{{ route('connexion') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-getstarted d-flex align-items-center shadow">
                    <i class="bi bi-person-circle me-2"></i> Sign In
                </button>
            </form>
        </div>
    @endguest

    </div>
</header>




