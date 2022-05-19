@props(['name', 'label' => null])

@if ($label)
  <x-forms.label :name="$name" :label="$label" />
@endif

<input name="{{ $name }}" type="file"
  {{ $attributes->merge([
      'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : ''),
  ]) }}>
<x-forms.invalid-feedback :name="$name" />
