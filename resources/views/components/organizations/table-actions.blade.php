<div {{ $attributes->merge([
    'class' => 'd-flex justify-content-between',
]) }}>
  <x-buttons.anchor :href="route('organizations.create')" content="Create organization" color="success" />
</div>
