@props(['name', 'label' => null])

@if ($label)
  <x-forms.label :name="$name" :label="$label" />
@endif

<input type="password" name="{{ $name }}"
  {{ $attributes->merge([
      'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : ''),
  ]) }}>
<x-forms.invalid-feedback :name="$name" />
