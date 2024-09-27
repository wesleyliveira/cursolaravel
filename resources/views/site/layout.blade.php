<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    @foreach($categoriasMenu as $categoriaM)
    <li><a href="{{route ('site.categoria', $categoriaM->id)}}">{{$categoriaM->nome}}</a></li>
    @endforeach

    
  </ul>
    <nav class="red">
        <div class="nav-wrapper container">
          <a href="#" class="brand-logo center">CursoLaravel</a>
          <ul id="nav-mobile" class="left">
            <li><a href="{{route('site.index')}}">Home</a></li>
            <li><a href="" class="dropdown-trigger" data-target='dropdown1'> Categorias <i class="material-icons right">expand_more</i> </a></li>
            <li><a href="{{route('site.carrinho')}}">Carrinho  <span style="border-radius: 45%; width: 15px; height: 25px; display: inline-flex; justify-content: center; align-items: center; font-size: 12px;" class="new badge blue" data-badge-caption="">
              {{\Cart::content()->count()}} </span></a></li>
          </ul>
        </div>
      </nav>
@yield('conteudo')   
<!-- Compiled and minifiedJavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
var elemDrop = document.querySelectorAll('.dropdown-trigger');
var instanceDrop = M.Dropdown.init(elemDrop, {
    coverTrigger: false,
    constrainWidth: false
});
</script>
            
</body>
</html>