<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
    @if(Auth::guard('admin')->user()->type=="enseignant")
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>paramettre</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url ('admin/update-enseignant-details')}}">
              <i class="bi bi-circle"></i><span>mettre a jour votre profile</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#componens-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>gerer examens</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="componens-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url ('admin/examns')}}">
              <i class="bi bi-circle"></i><span>liste des examens</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#compone-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>gerer le support des cours </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="compone-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url ('admin/cours')}}">
              <i class="bi bi-circle"></i><span>liste des cours</span>
            </a>
          </li>

        </ul>
      </li>
    @else
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>paramètres</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/update-admin-details')}}">
              <i class="bi bi-circle"></i><span>mise a jour profile</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/update-admin-password')}}">
              <i class="bi bi-circle"></i><span>modifier mot de passe</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/admins')}}">
              <i class="bi bi-circle"></i><span>liste des admins</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Section</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/sections')}}">
              <i class="bi bi-circle"></i><span>les sections</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#formss-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Niveau</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="formss-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/niveaux')}}">
              <i class="bi bi-circle"></i><span>les niveaux</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nas" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>gerer rapport</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nas" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/rapports')}}">
              <i class="bi bi-circle"></i><span>les rapports</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-navs" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Utilisateurs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-navs" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/users')}}">
              <i class="bi bi-circle"></i><span>les etudiants</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/subscribers')}}">
              <i class="bi bi-circle"></i><span>les abonnees</span>
            </a>
          </li>
        </ul>
      </li>

      @endif

      <!-- End Forms Nav -->

<!-- End Blank Page Nav -->

    </ul>

  </aside>
