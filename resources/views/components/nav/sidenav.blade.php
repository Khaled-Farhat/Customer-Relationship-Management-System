@php
if (!isset($activeNavItem)) {
    $activeNavItem = null;
}
@endphp

<nav class="col-2 h-100 px-0 navbar position-fixed navbar-expand-lg bg-dark d-flex align-items-start">
  <div class="container px-0">
    <ul class="navbar-nav flex-column mx-auto">
      <li class="nav-item">
        <a class="nav-link @if ($activeNavItem === 'dashboard') bg-primary bg-gradient @endif ps-3 pe-5 text-white" href="{{ route('dashboard') }}">
          <i class="bi bi-house-door-fill me-2"></i>
          Dashboard
        </a>
      </li>
      @can('viewAny', App\Models\User::class)
        <li class="nav-item">
          <a class="nav-link @if ($activeNavItem === 'users') bg-primary bg-gradient @endif ps-3 pe-5 text-white"
            href="{{ route('users.index') }}">
            <i class="bi bi-people-fill me-2"></i>
            Users
          </a>
        </li>
      @endcan
      @can('viewAny', App\Models\Client::class)
        <li class="nav-item">
          <a class="nav-link @if ($activeNavItem === 'clients') bg-primary bg-gradient @endif ps-3 pe-5 text-white"
            href="{{ route('clients.index') }}">
            <i class="bi bi-person-lines-fill me-2"></i>
            Clients
          </a>
        </li>
      @endcan
      @can('viewAny', App\Models\Organization::class)
        <li class="nav-item">
          <a class="nav-link @if ($activeNavItem === 'organizations') bg-primary bg-gradient @endif ps-3 pe-5 text-white"
            href="{{ route('organizations.index') }}">
            <i class="bi bi-door-open-fill me-2"></i>
            Organizations
          </a>
        </li>
      @endcan
      @can('viewAny', App\Models\Project::class)
        <li class="nav-item">
          <a class="nav-link @if ($activeNavItem === 'projects') bg-primary bg-gradient @endif ps-3 pe-5 text-white"
            href="{{ route('projects.index') }}">
            <i class="bi bi-briefcase-fill me-2"></i>
            Projects
          </a>
        </li>
      @endcan
      @can('viewAny', App\Models\Task::class)
        <li class="nav-item">
          <a class="nav-link @if ($activeNavItem === 'tasks') bg-primary bg-gradient @endif ps-3 pe-5 text-white"
            href="{{ route('tasks.index') }}">
            <i class="bi bi-clipboard2-check-fill me-2"></i>
            Tasks
          </a>
        </li>
      @endcan
      @can('viewAny', Silber\Bouncer\Database\Role::class)
        <li class="nav-item">
          <a class="nav-link @if ($activeNavItem === 'roles') bg-primary bg-gradient @endif ps-3 pe-5 text-white"
            href="{{ route('roles.index') }}">
            <i class="bi bi-incognito me-2"></i>
            Roles
          </a>
        </li>
      @endcan
    </ul>
  </div>
</nav>
