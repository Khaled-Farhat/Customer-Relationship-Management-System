@props(['name', 'label' => null, 'value' => null])

@if ($label)
  <x-forms.label :name="$name" :label="$label" />
@endif

<textarea name="{{ $name }}" rows="3"
  {{ $attributes->merge([
      'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : ''),
  ]) }}>{{ old($name, $value) }}</textarea>
<x-forms.invalid-feedback :name="$name" />
