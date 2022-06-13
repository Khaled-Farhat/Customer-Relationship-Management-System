<div class="list-group">
  <a class="list-group-item list-group-item-action @if ($activeUserNav == 'projects') active @endif"
    href="{{ route('users.projects.index', $user) }}">Projects</a>
  <a class="list-group-item list-group-item-action @if ($activeUserNav == 'tasks') active @endif"
    href="{{ route('users.tasks.index', $user) }}">Tasks</a>
</div>
