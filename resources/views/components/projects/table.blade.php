@props(['projects'])

@if ($projects->isEmpty())
  <div class="pt-3 pb-2">
    <h4 class="text-muted">No projects found.</h4>
  </div>
@else
  <div class="table-responsive">
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
            <td>
              @can('view', $project->client)
                <a href="{{ route('clients.show', $project->client) }}">{{ $project->client->name }}</a>
              @else
                <p class="my-auto">{{ $project->client->name }}</p>
              @endcan
            </td>
            <td>
              @isset($project->manager)
                @can('view', $project->manager)
                  <a href="{{ route('users.show', $project->manager) }}">{{ $project->manager->name }}</a>
                @else
                  <p class="my-auto">{{ $project->manager->name }}</p>
                @endcan
              @else
                Deleted user
              @endisset
            </td>
            <td>{{ $project->deadline->toDateString() }}</td>
            <td>{{ $project->created_at->toDateString() }}</td>
            <td>{{ $project->status->name }}</td>
            <td>
              <div class="d-flex gap-1">
                @can('view', $project)
                  <x-buttons.anchor :href="route('projects.show', $project)" content="Show" size="small" color="primary" />
                @endcan
                @can('update', $project)
                  <x-buttons.anchor :href="route('projects.edit', $project)" content="Edit" size="small" color="warning" />
                @endcan
                @can('delete', $project)
                  <x-buttons.form :action="route('projects.destroy', $project)" content="Delete" size="small" color="danger" />
                @endcan
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $projects->links() }}
@endif
