@props(['users'])

<table class="table-hover table align-middle">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone number</th>
      <th>Address</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->address }}</td>
        <td>
          <x-buttons.anchor :href="route('users.show', $user)" content="Show" size="small" color="primary" />
          <x-buttons.anchor :href="route('users.edit', $user)" content="Edit" size="small" color="warning" />
          <x-buttons.form :action="route('users.destroy', $user)" content="Delete" size="small" color="danger" />
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $users->links() }}
