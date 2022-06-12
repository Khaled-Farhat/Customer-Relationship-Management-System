@props(['name', 'label' => null, 'value' => null, 'hasFeedback' => true])

@if ($label)
  <x-forms.label :name="$name" :label="$label" />
@endif

<input type="date" name="{{ $name }}" value="{{ old($name, $value) }}"
  {{ $attributes->merge([
      'class' => 'form-control' . ($hasFeedback && $errors->has($name) ? ' is-invalid' : ''),
  ]) }}>

@if ($hasFeedback)
  <x-forms.invalid-feedback :name="$name" />
@endif
