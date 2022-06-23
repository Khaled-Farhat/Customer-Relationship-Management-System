<div class="list-group">
  <a class="list-group-item list-group-item-action @if ($activeRoleNav == 'permissions') active @endif"
    href="{{ route('roles.permissions.index', $role) }}">Permissions</a>
  <a class="list-group-item list-group-item-action @if ($activeRoleNav == 'users') active @endif"
    href="{{ route('roles.users.index', $role) }}">Users</a>
</div>
