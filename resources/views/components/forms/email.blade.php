@props(['name', 'label' => null, 'value' => null])

@if ($label)
  <x-forms.label :name="$name" :label="$label" />
@endif

<input type="email" name="{{ $name }}" value="{{ old($name, $value) }}"
  {{ $attributes->merge([
      'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : ''),
  ]) }}>
<x-forms.invalid-feedback :name="$name" />
