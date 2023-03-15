<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>jQuery UI Dialog functionality</title>
    <link
      href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
      rel="stylesheet"
    />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!-- CSS -->
    <style>
      .ui-widget-header,
      .ui-state-default,
      ui-button {
        background: #b9cd6d;
        border: 1px solid #b9cd6d;
        color: #ffffff;
        font-weight: bold;
      }
    </style>

    <!-- Javascript -->
    <script>
      $(function () {
        $("#dialog-1").dialog({
          autoOpen: false,
        });
        $("#opener").click(function () {
          $("#dialog-1").dialog("open");
        });
      });
    </script>
  </head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        $(document).ready(function() {
        $('#openModal').click(function() {
            $('#myModal').show();
        });

        $('#myForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
            url: 'submit.php', // Replace with your form submission URL
            type: 'post',
            data: $('#myForm').serialize(),
            success: function(response) {
                $('#myModal').hide();
                // Handle successful form submission
            },
            error: function() {
                alert('Error submitting form');
            }
            });
        });
        });

        $(document).ready(function () {
            $("#myText").fadeIn(2000);
        });

        $(document).ready(function () {
            $("#hidden").hover(function () {
                $(this).css("color", "green");
            });
        });

    </script>
</body>
</html>