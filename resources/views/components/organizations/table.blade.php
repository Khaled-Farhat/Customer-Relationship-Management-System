@props(['organizations'])

@if ($organizations->isEmpty())
  <div class="pt-3 pb-2">
    <h4 class="text-muted">No organizations found.</h4>
  </div>
@else
  <table class="table-hover table align-middle">
    <thead>
      <tr>
        <th>Name</th>
        <th>Website</th>
        <th>Address</th>
        <th>Projects count</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($organizations as $organization)
        <tr>
          <td>{{ $organization->name }}</td>
          <td><a href="{{ $organization->website }}">Link</a></td>
          <td>{{ $organization->address }}</td>
          <td>{{ $organization->projects_count }}</td>
          <td>
            <x-buttons.anchor :href="route('organizations.show', $organization)" content="Show" size="small" color="primary" />
            <x-buttons.anchor :href="route('organizations.edit', $organization)" content="Edit" size="small" color="warning" />
            <x-buttons.form :action="route('organizations.destroy', $organization)" content="Delete" size="small" color="danger" />
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $organizations->links() }}
@endif
