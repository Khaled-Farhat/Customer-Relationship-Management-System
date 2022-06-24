<div class="card">
  <div class="card-body d-flex pt-4">
    <div class="col-3 pe-2">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Organization name</h6>
        <h2 class="card-subtitle">{{ $organization->name }}</h2>
      </div>
      <div>
        @can('update', $organization)
          <x-buttons.anchor :href="route('organizations.edit', $organization)" content="Edit organization" size="small" color="warning" class="my-1" />
        @endcan
        @can('delete', $organization)
          <x-buttons.form :action="route('organizations.destroy', $organization)" content="Delete organization" size="small" color="danger" class="my-1" />
        @endcan
      </div>
    </div>
    <div class="col-2 px-3">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Address</h6>
        <h6 class="card-subtitle">{{ $organization->address }}</h6>
      </div>
      <div class="align-bottom">
        <h6 class="card-subtitle text-muted mb-1">Website</h6>
        <h6 class="card-subtitle">
          <a href="{{ $organization->website }}">Link</a>
        </h6>
      </div>
    </div>
    <div class="ps-2">
      <h6 class="card-subtitle text-muted mb-1">Description</h6>
      <p class="card-subtitle">{{ $organization->description }}</p>
    </div>
  </div>
</div>
