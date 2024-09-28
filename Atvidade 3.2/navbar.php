<link rel="stylesheet" href="style.css">


<nav class="navbar navbar-expand-sm bg-body-tertiary">
  <div class="container-fluid my-container-barra">

    
    <a class="navbar-brand" href="#">Cadastro de nome</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        
        <li class="nav-item">
          <?php if($pg_atual == 'home'): ?>
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          <?php else: ?>
            <a class="nav-link" href="#">Home</a>
          <?php endif; ?>
        </li>
        
       
        <li class="nav-item">
          <?php if($pg_atual == 'nome'): ?>
            <a class="nav-link active" aria-current="page" href="#">Nome</a>
          <?php else: ?>
            <a class="nav-link" href="primeira.php">Nome</a>
          <?php endif; ?>
        </li>
        
        
        <li class="nav-item">
          <?php if($pg_atual == 'nome_salvado'): ?>
            <a class="nav-link active" aria-current="page" href="#">Nome Salvado</a>
          <?php else: ?>
            <a class="nav-link" href="nome_salvado.php">Nome Salvado</a>
          <?php endif; ?>
        </li>

        <li class="nav-item">
          <?php if($pg_atual == 'logout'): ?>
            <a class="nav-link active" aria-current="page" href="#">Encerrar Sessão</a>
          <?php else: ?>
            <a class="nav-link" href="logout.php">Encerrar Sessão</a>
          <?php endif; ?>
        </li>

      </ul>
    </div>
  </div>
</nav>