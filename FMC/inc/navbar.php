<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/FMC/index.php?vista=conteo">
        <img src="./img/images.png" width="30" height="50">
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
       
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">Inventario</a>

        <div class="navbar-dropdown">
               <a class="navbar-item" href="/FMC/index.php?vista=Faltantes">Faltantes</a>
               <a class="navbar-item" href="/FMC/index.php?vista=sobrantes" >Sobrantes</a>
               <a class="navbar-item" href="/FMC/index.php?vista=proximo_vencer">Proximo a Vencer</a>
               <a class="navbar-item" href="/FMC/index.php?vista=merma" >Merma</a>
               <!-- <a class="navbar-item" href="/Farmacia/index.php?vista=errores_venta">Errores en venta</a> -->
               <a class="navbar-item" href="/FMC/index.php?vista=inventario">Inventario</a>
          </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">Otros</a>

        <div class="navbar-dropdown">
               <a class="navbar-item" href="/FMC/index.php?vista=ajuste">Ajuste</a>
          </div>
      </div>
      </div>
      
      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
              <a href="/FMC/index.php?vista=login" class="button is-primary is-rounded is-small">Configuración</a>        
          <div class="buttons">
              <a href="/FMC/index.php?vista=logout" class="button is-link is-rounded is-small">Salir</a>
          </div>
          </div>
        </div>
      </div>
      </div>
  </nav>