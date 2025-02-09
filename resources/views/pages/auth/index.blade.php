<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>E Library</title>
    <!-- CSS files -->
    <link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-socials.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-marketing.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet" />
    <style>
      @import url('https://rsms.me/inter/inter.css');
    </style>
  </head>
  <body class=" d-flex flex-column bg-white">
    <script src="{{ asset('js/demo-theme.min.js?1738096682') }}"></script>
    <div class="row g-0 flex-fill">
      <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
        <div class="container container-tight my-5 px-lg-5">
          <div class="text-center mb-4">
            <a href="#" class="navbar-brand navbar-brand-autodark">
              <h2>E-Library</h2>
            </a>
          </div>
          <h2 class="h3 text-center mb-3"> Silakan Masuk Menggunakan Akun Anda</h2>
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            @if (session('danger'))
              <div class="alert alert-danger">
                  {{ session('danger') }}
              </div>
            @endif
            @if (session('danger-with-link'))
              <div class="alert alert-danger">
                  {!! session('danger-with-link') !!}
              </div>
            @endif
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
          {{ html()->form('POST', route('auth.login'))->open() }}
            <div class="mb-3">
              {{ html()->label('Email Address', 'email')->class('form-label') }}
              {{ html()->input('email', 'email')
                ->class('form-control')->attribute('required', true)
                ->attribute('placeholder', 'your@email.com') }}
            </div>
            <div class="mb-3">
              {{ html()->label('Password', 'password')->class('form-label') }}
              {{ html()->input('password', 'password')
                ->class('form-control')->attribute('required', true)
                ->attribute('placeholder', 'Your password') }}
            </div>
            <div class="form-footer">
              {{ html()->button('Masuk')->class('btn btn-primary')->attribute('type', 'submit') }}
            </div>
          {{ html()->form()->close() }}
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
        <!-- Photo -->
        <div class="bg-cover h-100 min-vh-100" style="background-image: url(./static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg)"></div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('js/demo.min.js') }}" defer></script>
  </body>
</html>