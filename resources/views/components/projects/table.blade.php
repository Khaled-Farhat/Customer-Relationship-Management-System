@props(['projects'])

@if ($projects->isEmpty())
  <div class="pt-3 pb-2">
    <h4 class="text-muted">No projects found.</h4>
  </div>
@else
  <table class="table-hover table align-middle">
    <thead>
      <tr>
        <th>Title</th>
        <th>Client</th>
        <th>Manager</th>
        <th>Deadline</th>
        <th>Created at</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
        <tr>
          <td>{{ $project->title }}</td>
          <td><a href="{{ route('clients.show', $project->client) }}">{{ $project->client->name }}</a></td>
          <td><a href="{{ route('users.show', $project->manager) }}">{{ $project->manager->name }}</a></td>
          <td>{{ $project->deadline->toDateString() }}</td>
          <td>{{ $project->created_at->toDateString() }}</td>
          <td>{{ $project->status->name }}</td>
          <td>
            <div class="d-flex gap-1">
              <x-buttons.anchor :href="route('projects.show', $project)" content="Show" size="small" color="primary" />
              <x-buttons.anchor :href="route('projects.edit', $project)" content="Edit" size="small" color="warning" />
              <x-buttons.form :action="route('projects.destroy', $project)" content="Delete" size="small" color="danger" />
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $projects->links() }}
@endif
