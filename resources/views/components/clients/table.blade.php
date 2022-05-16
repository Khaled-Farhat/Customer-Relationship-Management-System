@props(['clients', 'showOrganization' => false])

<table class="table-hover table">
  <thead>
    <th>Name</th>
    <th>Email</th>
    <th>Phone number</th>
    @if ($showOrganization)
      <th>Organization</th>
    @endif
    <th>Actions</th>
  </thead>
  <tbody>
    @foreach ($clients as $client)
      <tr>
        <td>{{ $client->name }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->phone }}</td>
        @if ($showOrganization)
          <td><a
              href="{{ route('organizations.show', $client->organization_id) }}">{{ $client->organization->name }}</a>
          </td>
        @endif
        <td>
          <x-buttons.anchor :href="route('clients.show', $client)" content="Show" size="small" color="primary" />
          <x-buttons.anchor :href="route('clients.edit', $client)" content="Edit" size="small" color="warning" />
          <x-buttons.form :action="route('clients.destroy', $client)" content="Delete" size="small" color="danger" />
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $clients->links() }}
