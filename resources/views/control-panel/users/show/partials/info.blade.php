<div class="card">
  <div class="card-body d-flex pt-4">
    <div class="col-4 pe-2">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">User name</h6>
        <h2 class="card-subtitle">{{ $user->name }}</h2>
      </div>
      <div>
        @can('update', $user)
          <x-buttons.anchor :href="route('users.edit', $user)" content="Edit user" size="small" color="warning" class="my-1" />
        @endcan
        @can('delete', $user)
          <x-buttons.form :action="route('users.destroy', $user)" content="Delete user" size="small" color="danger" class="my-1" />
        @endcan
      </div>
    </div>
    <div class="col-3 px-3">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Email</h6>
        <h6 class="card-subtitle">{{ $user->email }}</h6>
      </div>
      <div class="align-bottom">
        <h6 class="card-subtitle text-muted mb-1">Phone</h6>
        <h6 class="card-subtitle">{{ $user->phone }}</h6>
      </div>
    </div>
    <div class="ps-2">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Address</h6>
        <h6 class="card-subtitle">{{ $user->address }}</h6>
      </div>
      <div class="align-bottom">
        <h6 class="card-subtitle text-muted mb-1">Role</h6>
        <h6 class="card-subtitle">{{ $user->roles->first()->title }}</h6>
      </div>
    </div>
  </div>
</div>
