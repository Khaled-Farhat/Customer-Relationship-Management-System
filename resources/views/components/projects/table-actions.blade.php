<div {{ $attributes->merge([
    'class' => 'd-flex justify-content-between',
]) }}>
  @can('create', App\Models\Project::class)
    <x-buttons.anchor :href="route('projects.create')" content="Create project" color="success" />
  @endcan
  <x-statuses.filter-button />
</div>
