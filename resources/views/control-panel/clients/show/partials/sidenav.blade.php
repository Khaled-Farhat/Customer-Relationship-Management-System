<div class="list-group">
  <a class="list-group-item list-group-item-action @if ($activeClientNav == 'projects') active @endif"
    href="{{ route('clients.projects.index', $client) }}">Projects</a>
  <a class="list-group-item list-group-item-action @if ($activeClientNav == 'documents') active @endif"
    href="{{ route('clients.documents.index', $client) }}">Documents</a>
</div>
