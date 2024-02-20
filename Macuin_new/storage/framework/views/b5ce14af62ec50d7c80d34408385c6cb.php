<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Diario Laravel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link <?php echo e(request()->routeIs('apodoInicio') ?'text-primary fw-bold':''); ?>" aria-current="page" href="<?php echo e(route('apodoInicio')); ?>">Inicio</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo e(request()->routeIs('recuerdo.create') ?'text-warning fw-bold':''); ?>" aria-current="page" href="<?php echo e(route('recuerdo.create')); ?>"" href="<?php echo e(route('recuerdo.create')); ?>">Formulario</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo e(request()->routeIs('recuerdo.index') ?'text-danger fw-bold':''); ?>" aria-current="page" href="<?php echo e(route('recuerdo.index')); ?>"" href="<?php echo e(route('recuerdo.index')); ?>"  href="<?php echo e(route('recuerdo.index')); ?>">Recuerdos</a>
        </li> 

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<?php /**PATH /Users/fer/pw182/laravel/resources/views/partials/navbar.blade.php ENDPATH**/ ?>