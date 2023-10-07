<!DOCTYPE html>
<html lang="en">
    <head>
    
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Welcome to Ibrahim Memorial Hospital</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

     <!-- Favicons -->
    <link href="{{ asset('img/Ibrahim logo.jpg')}}" rel="icon" style="width: 200%; border-radius: 30px;">
    <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>

    @vite('resources/js/app.js')


    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />
          @vite('resources/css/app.css')

    <link href="{{  asset('css/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link
      href="{{ asset('css/assets/vendor/bootstrap/css/bootstrap.min.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('css/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
      rel="stylesheet"
    />
    <link href="{{ asset('css/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link
      href="{{ asset('css/assets/vendor/glightbox/css/glightbox.min.css') }}"
      rel="stylesheet"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="{{ asset('css/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    
    </head>
    <body>

        <!-- ======= Top Bar ======= -->
      <div id="topbar" class="d-flex align-items-center fixed-top">
        <div
          class="container d-flex align-items-center justify-content-center justify-content-md-between"
        >
          <div class="align-items-center d-none d-md-flex">
            <i class="bi bi-clock"></i> Monday - Sunday, 8AM to 10PM
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-phone"></i> Call us now +234 703 557 7786
          </div>
        </div>
      </div>

      <!-- ======= Header ======= -->
      <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
          <a href="{{ route('/') }}" class="logo me-auto"  
          >
          <h4><span><img src="assets/img/Ibrahim logo.jpg" alt=""></span> Ibrahim Memorial Hospital</h4>
          </a>
          <!-- To uncomment below if I prefer to use an image logo -->
          <!-- <h1 class="logo me-auto"><a href="index.html">Ibrahim Memorial</a></h1> -->

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              @if (Auth::check())
                <li><a class="nav-link scrollto bg {{ Route::currentRouteName() === '/' ? 'app': '' }} " href="{{ route('/') }}">Home</a></li>
                <li><a class="nav-link scrollto {{ Route::currentRouteName() === 'appointment' || 'appointments' ? 'app' : '' }} " href="#about">About</a></li>
                <li><a class="nav-link scrollto {{ Route::currentRouteName() === 'appointment' || 'appointments' ? 'app' : '' }} " href="#services">Services</a></li>
                <li>
                  <a class="nav-link scrollto {{ Route::currentRouteName() === 'appointment' || 'appointments' ? 'app' : '' }} " href="#departments">Departments</a>
                </li>
                <li><a class="nav-link scrollto {{ Route::currentRouteName() === 'appointment' || 'appointments' ? 'app' : '' }} " href="#doctors">Staff</a></li>
          
                <li><a class="nav-link scrollto {{ Route::currentRouteName() === 'appointment' || 'appointments' ? 'app' : '' }} " href="#contact">Contact</a></li>
              @else
                <li><a class="nav-link scrollto bg" href="{{ route('/') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li>
                  <a class="nav-link scrollto" href="#departments">Departments</a>
                </li>
                <li><a class="nav-link scrollto" href="#doctors">Staff</a></li>
        
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
              @endif


              @if (Auth::check())
                @if(Route::currentRouteName() === 'appointment' || 'view.appointments' && Route::currentRouteName() !== '/' )
                @else
                  <li><a class="nav-link scrollto" href="{{ route('view.appointments') }}">View Appointments</a></li>
                @endif
                  {{-- @if(Route::currentRouteName() === 'appointments')
                  @else
                    <li><a class="nav-link scrollto" href="{{ route('view.appointments') }}">View Appointments</a></li>
                  @endif --}}
              @else
              @endif

              @if (Auth::check())
              <li><a class="nav-link scrollto" href="{{ route('logout') }}">Logout</a></li>
              @else
              <li><a class="nav-link scrollto" href="{{ route('loginForm') }}">Login</a></li>
              @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
      
          @if (Auth::check())
              {{-- User is authenticated, display booking link --}}
              {{-- <a href="{{ route('appointment') }}">Book Appointment</a> --}}
              @if(Route::currentRouteName() === 'appointment')
                <a href="{{ route('view.appointments') }}" class="appointment-btn scrollto"
               ><span class="d-none d-md-inline">View </span> Appointment</a>
              @else
              <a href="{{ route('appointment') }}" class="appointment-btn scrollto"
              ><span class="d-none d-md-inline">Book </span> Appointment</a>
              @endif
          @else
              {{-- User is not authenticated, display registration link --}}
            <a href="{{ route('loginForm') }}" class="appointment-btn scrollto"
            ><span class="d-none d-md-inline">Book </span> Appointment</a>
          @endif

          

          
        </div>
      </header>
      
      <main>
       
         {{$slot}}
         
      </main>
       
      


      <x-footer/>

      <x-flash-successBooking/>
      <x-flash-successRegister/>
      <x-flash-successLogin/>

      <!-- Vendor JS Files -->
      <script src="{{ asset('vendor/vendor/purecounter/purecounter_vanilla.js') }}"></script>
      <script src="{{ asset('vendor/vendor/aos/aos.js') }}"></script>
      <script src="{{ asset('vendor/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('vendor/vendor/glightbox/js/glightbox.min.js') }}"></script>
      <script src="{{ asset('vendor/vendor/swiper/swiper-bundle.min.js') }}"></script>
      <script src="{{ asset('vendor/vendor/php-email-form/validate.js') }}"></script>
   
      <script src="{{ asset('js/main.js') }}"></script>


    </body>