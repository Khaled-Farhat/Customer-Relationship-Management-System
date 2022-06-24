<div class="card">
  <div class="card-body d-flex pt-4">
    <div class="col-3 pe-2">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Role name</h6>
        <h2 class="card-subtitle">{{ $role->title }}</h2>
      </div>
      <div>
        @can('update', $role)
          <x-buttons.anchor :href="route('roles.edit', $role)" content="Edit role" size="small" color="warning" class="my-1" />
        @endcan
        @can('delete', $role)
          <x-buttons.form :action="route('roles.destroy', $role)" content="Delete role" size="small" color="danger" class="my-1" />
        @endcan
      </div>
    </div>
  </div>
</div>
