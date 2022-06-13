<div {{ $attributes->merge([
    'class' => 'd-flex justify-content-between',
]) }}>
  <x-buttons.anchor :href="route('tasks.create')" content="Create task" color="success" />
  <x-statuses.filter-button />
</div>
