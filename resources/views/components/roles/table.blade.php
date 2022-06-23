@props(['roles'])

<table class="table-hover table align-middle">
  <thead>
    <tr>
      <th>Title</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($roles as $role)
      <tr>
        <td>{{ $role->title }}</td>
        <td>
          <x-buttons.anchor :href="route('roles.show', $role)" content="Show" size="small" color="primary" />
          <x-buttons.anchor :href="route('roles.edit', $role)" content="Edit" size="small" color="warning" />
          <x-buttons.form :action="route('roles.destroy', $role)" content="Delete" size="small" color="danger" />
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $roles->links() }}
