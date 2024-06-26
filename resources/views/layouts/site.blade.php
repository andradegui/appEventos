<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- Configuração Bootstrap 4.5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">

      <a class="navbar-brand" href={{route('home')}}>Eventos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

          <li class="nav-item active">
            <a class="nav-link" href={{route('home')}}> Home <span class="sr-only">(current)</span></a>
          </li>        

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>

            <div class="dropdown-menu">

              @foreach ( $categories as $category )
                  
                <a class="dropdown-item" href="{{route('home', ['category' => $category->slug])}}">{{$category->name}}</a>

              @endforeach

            </div>
          </li>

        </ul>

        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Buscar evento" aria-label="Search" name="s" value="{{request()->query('s')}}">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>

        <ul class="navbar-nav">
          @auth
            <li class="nav-item">
              <a href="{{route('admin.events.index')}}" class="nav-link">Meu Painel</a>
            </li>
          @else
            <li class="nav-item">
              <a href="{{route('login')}}" class="nav-link">Login</a>
            </li>
          @endauth

          {{-- Outra forma de verficar se o usuário está logado --}}
          {{-- @guest

          @else
              
          @endguest --}}
        </ul>

      </div>

    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>