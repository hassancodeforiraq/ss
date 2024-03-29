<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.min.css') }}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body{
            background: #9e9e9e;
        }
        .page-link{
            background: #8d6e63;
            color: #FFF;
            border-color:#FFF;
        }
        .page-item.active .page-link{
            background: #795548;
            border-color:#FFF;
        }
        </style>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Emergency</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('products') }}">ADD PRODUCT</a>
                        <a class="dropdown-item" href="{{ route('products') }}">SHOW PRODUCTS</a>
                        </div>
                    </li>
                </ul>
                @if (Auth::user())
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Materals
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('materals.add') }}">ADD MATERAL</a>
                        <a class="dropdown-item" href="{{ route('materals') }}">SHOW MATERAL</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('materals.trashed') }}">SHOW MATERALS DELETED</a>
                        </div>
                    </li>
                </ul>
                @endif
                <ul class="navbar-nav ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tags
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('tag.add') }}">ADD TAG</a>
                            <a class="dropdown-item" href="{{ route('tags') }}">SHOW TAGS</a>
                            </div>
                        </li>
                    </ul>

                <ul class="navbar-nav ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tickets
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('tickets.add') }}">Add Ticket</a>
                            <a class="dropdown-item" href="{{ route('tickets') }}">Show Ticket</a>
                            </div>
                        </li>
                    </ul>

                <ul class="navbar-nav ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Xray
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('xrays.add') }}">Add Xray</a>
                            <a class="dropdown-item" href="{{ route('xrays') }}">Show Xrays</a>
                            </div>
                        </li>
                    </ul>
              <form class="form-inline my-2 my-lg-0 ml-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>
    </div>
   <div class="container">
    @yield('contents')

   </div>
   
   {{-- @include('materals.demo') --}}

    <script src="{{ asset('js/jquery-3.4.min.js') }}"></script>
    <script src="{{ asset('js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
</body>
</html>