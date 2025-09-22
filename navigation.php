<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient">
  <div class="container">
  <a class="navbar-brand" href="#">
    <img src="image/bpbd.png" width="50pc"></a>  
  <a class="navbar-brand me-5">BPBD KOTA KUPANG</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
          <li class="nav-item me-4">
              <a class="nav-link text-light fw-semibold" href="dashboard.php">Dashboard</a>
          </li>
          <div class="dropdown">
               <button class="btn btn dropdown-toggle me-4 text-light fw-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Input Data </button>
                <ul class="dropdown-menu dropdown-menu">
                  <li><a class="dropdown-item fw-semibold" href="input.php">Input Data kejadian</a></li>
                  <li><a class="dropdown-item fw-semibold" href="#">Input User Stakeholder</a></li>
                  <li><a class="dropdown-item fw-semibold" href="inputcuaca.php">Update Prakiraan Cuaca Wil. Perairan</a></li>
                  <li><a class="dropdown-item fw-semibold" href="#">Update Prakiraan Cuaca Wil. Pelayanan</a></li> 
                </ul>
          </div>
          <li class="nav-item me-4">
              <a class="nav-link text-light fw-semibold" href="logout.php">Logout</a>
          </li>
      </ul>
    </div>
    <div class="container-end">
    <form class="d-flex" role="search">
      <input class="form-control me-4" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-warning text-light" type="submit">Search</button>
    </form>
  </div>

</div>
</nav>