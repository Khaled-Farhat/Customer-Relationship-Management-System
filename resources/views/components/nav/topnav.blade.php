<nav class="navbar bg-dark sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand text-white" href="">CRM</a>

    <li class="dropdown">
      <a class="dropdown-toggle text-decoration-none text-white" href="#" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{ auth()->user()->name }}
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
          <a class="dropdown-item" href="{{ route('users.show', auth()->user()) }}"><i
              class="bi bi-person-fill me-2"></i>Profile</a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-left me-2"></i>Sign out</a>
        </li>
      </ul>
    </li>
  </div>
</nav>
