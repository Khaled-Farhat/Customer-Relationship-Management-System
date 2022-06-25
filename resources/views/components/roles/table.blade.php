@props(['roles'])
<div class="table-responsive">
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
            <div class="d-flex gap-1">
              @can('view', $role)
                <x-buttons.anchor :href="route('roles.show', $role)" content="Show" size="small" color="primary" />
              @endcan
              @can('update', $role)
                <x-buttons.anchor :href="route('roles.edit', $role)" content="Edit" size="small" color="warning" />
              @endcan
              @can('delete', $role)
                <x-buttons.form :action="route('roles.destroy', $role)" content="Delete" size="small" color="danger" />
              @endcan
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{ $roles->links() }}
