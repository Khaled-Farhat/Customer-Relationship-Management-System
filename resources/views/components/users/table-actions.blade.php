@can('create', App\Models\User::class)

<div {{ $attributes->merge([
    'class' => 'd-flex justify-content-between',
]) }}>
  <x-buttons.anchor :href="route('users.create')" content="Create user" color="success" />
</div>
@endcan
