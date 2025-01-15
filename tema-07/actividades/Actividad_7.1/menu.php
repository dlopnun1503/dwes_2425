<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Noticias</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?= ($archivo_actual == "index.php")? 'active':null ?> ">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item <?= ($archivo_actual == "about.php")? 'active':null ?>">
          <a class="nav-link" href="about.php">About
          </a>
        </li>
        <li class="nav-item <?= ($archivo_actual == "services.php")? 'active':null ?>">
          <a class="nav-link" href="services.php">Services
          </a>
        </li>
        <li class="nav-item <?= ($archivo_actual == "events.php")? 'active':null ?>">
          <a class="nav-link" href="events.php">Events
          </a>
          <li class="nav-item <?= ($archivo_actual == "close.php")? 'active':null ?>">
          <a class="nav-link" href="close.php">Close
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>