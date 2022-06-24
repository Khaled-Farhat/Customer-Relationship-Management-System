<div {{ $attributes->merge([
    'class' => 'd-flex justify-content-between',
]) }}>
  @can('create', Silber\Bouncer\Database\Role::class)
    <x-buttons.anchor :href="route('roles.create')" content="Create role" color="success" />
  @endcan
</div>
