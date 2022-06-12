<nav class="navbar position-fixed navbar-expand-lg bg-dark d-flex align-items-start h-100">
  <div class="container px-4">
    <ul class="navbar-nav flex-column mx-auto">
      <li class="nav-item @if ($activeNavItem === 'dashboard') bg-primary bg-gradient @endif rounded px-2">
        <a class="nav-link ps-2 pe-5 text-white" aria-current="page" href="#">
          <i class="bi bi-house-door-fill me-2"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item px-2">
        <a class="nav-link @if ($activeNavItem === 'users') bg-primary bg-gradient @endif ps-2 pe-5 text-white"
          href="{{ route('users.index') }}">
          <i class="bi bi-people-fill me-2"></i>
          Users
        </a>
      </li>
      <li class="nav-item px-2">
        <a class="nav-link @if ($activeNavItem === 'clients') bg-primary bg-gradient @endif ps-2 pe-5 text-white"
          href="{{ route('clients.index') }}">
          <i class="bi bi-person-lines-fill me-2"></i>
          Clients
        </a>
      </li>
      <li class="nav-item px-2">
        <a class="nav-link @if ($activeNavItem === 'organizations') bg-primary bg-gradient @endif ps-2 pe-5 text-white"
          href="{{ route('organizations.index') }}">
          <i class="bi bi-door-open-fill me-2"></i>
          Organizations
        </a>
      </li>
      <li class="nav-item px-2">
        <a class="nav-link @if ($activeNavItem === 'projects') bg-primary bg-gradient @endif ps-2 pe-5 text-white"
          href="{{ route('projects.index') }}">
          <i class="bi bi-briefcase-fill me-2"></i>
          Projects
        </a>
      </li>
    </ul>
  </div>
</nav>
