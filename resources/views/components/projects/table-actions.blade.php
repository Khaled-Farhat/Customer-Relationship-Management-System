<div {{ $attributes->merge([
    'class' => 'd-flex justify-content-between',
]) }}>
  <x-buttons.anchor :href="route('projects.create')" content="Create project" color="success" />
  <x-statuses.filter-button />
</div>
