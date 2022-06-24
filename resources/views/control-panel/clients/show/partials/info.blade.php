<div class="card">
  <div class="card-body d-flex pt-4">
    <div class="col-4 pe-2">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Client name</h6>
        <h2 class="card-subtitle">{{ $client->name }}</h2>
      </div>
      <div>
        @can('update', $client)
          <x-buttons.anchor :href="route('clients.edit', $client)" content="Edit client" size="small" color="warning" class="my-1" />
        @endcan
        @can('delete', $client)
          <x-buttons.form :action="route('clients.destroy', $client)" content="Delete client" size="small" color="danger" class="my-1" />
        @endcan
      </div>
    </div>
    <div class="col-3 px-3">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Email</h6>
        <h6 class="card-subtitle">{{ $client->email }}</h6>
      </div>
      <div class="align-bottom">
        <h6 class="card-subtitle text-muted mb-1">Phone</h6>
        <h6 class="card-subtitle">{{ $client->phone }}</h6>
      </div>
    </div>
    <div class="ps-2">
      <h6 class="card-subtitle text-muted mb-1">Organization</h6>
      <h6 class="card-subtitle">
        @can('view', $client->organization)
          <a href="{{ route('organizations.show', $client->organization) }}">{{ $client->organization->name }}</a>
        @else
          <p class="my-auto">{{ $client->organization->name }}</p>
        @endcan
      </h6>
    </div>
  </div>
</div>
