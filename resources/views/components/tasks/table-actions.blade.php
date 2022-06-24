<div {{ $attributes->merge([
    'class' => 'd-flex justify-content-between',
]) }}>
  @can('create', App\Models\Task::class)
    <x-buttons.anchor :href="route('tasks.create')" content="Create task" color="success" />
  @endcan
  <x-statuses.filter-button />
</div>
