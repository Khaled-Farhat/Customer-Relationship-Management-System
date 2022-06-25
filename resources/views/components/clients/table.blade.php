@props(['clients', 'showOrganization' => false])

@if ($clients->isEmpty())
  <div class="pt-3 pb-2">
    <h4 class="text-muted">No clients found.</h4>
  </div>
@else
  <div class="table-responsive">
    <table class="table-hover table align-middle">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone number</th>
          @if ($showOrganization)
            <th>Organization</th>
          @endif
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($clients as $client)
          <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->phone }}</td>
            @if ($showOrganization)
              <td>
                @can('view', $client->organization)
                  <a
                    href="{{ route('organizations.show', $client->organization) }}">{{ $client->organization->name }}</a>
                @else
                  <p class="my-auto">{{ $client->organization->name }}</p>
                @endcan
              </td>
            @endif
            <td>
              <div class="d-flex gap-1">
                @can('view', $client)
                  <x-buttons.anchor :href="route('clients.show', $client)" content="Show" size="small" color="primary" />
                @endcan
                @can('update', $client)
                  <x-buttons.anchor :href="route('clients.edit', $client)" content="Edit" size="small" color="warning" />
                @endcan
                @can('delete', $client)
                  <x-buttons.form :action="route('clients.destroy', $client)" content="Delete" size="small" color="danger" />
                @endcan
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $clients->links() }}
@endif
