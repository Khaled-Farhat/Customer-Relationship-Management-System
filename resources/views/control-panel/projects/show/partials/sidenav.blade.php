<div class="list-group">
  <a class="list-group-item list-group-item-action @if ($activeProjectNav == 'tasks') active @endif"
    href="{{ route('projects.tasks.index', $project) }}">Tasks</a>
  <a class="list-group-item list-group-item-action @if ($activeProjectNav == 'documents') active @endif"
    href="{{ route('projects.documents.index', $project) }}">Documents</a>
</div>
