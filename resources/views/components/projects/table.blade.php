@props(['projects'])

<table class="table-hover table align-middle">
  <thead>
    <tr>
      <th>Title</th>
      <th>Client</th>
      <th>Manager</th>
      <th>Deadline</th>
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
        <td>{{ $project->status->name }}</td>
        <td>
          <x-buttons.anchor :href="route('projects.show', $project)" content="Show" size="small" color="primary" />
          <x-buttons.anchor :href="route('projects.edit', $project)" content="Edit" size="small" color="warning" />
          <x-buttons.form :action="route('projects.destroy', $project)" content="Delete" size="small" color="danger" />
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $projects->links() }}
