@props(['name', 'label' => null, 'options', 'selected' => null, 'hasFeedback' => true])

@if ($label)
  <x-forms.label :name="$name" :label="$label" />
@endif

<select name={{ $name }}
  {{ $attributes->merge([
      'class' => 'form-control' . ($hasFeedback && $errors->has($name) ? ' is-invalid' : ''),
  ]) }}>
  @foreach ($options as $key => $value)
    <option value="{{ $value }}" @if ($value === $selected) selected @endif>{{ $key }}
    </option>
  @endforeach
</select>

@if ($hasFeedback)
  <x-forms.invalid-feedback :name="$name" />
@endif
