@props(['name', 'label' => null, 'options', 'selected' => null])

@if ($label)
  <x-forms.label :name="$name" :label="$label" />
@endif

<select name={{ $name }} {{ $attributes->merge([
    'class' => 'form-select',
]) }}>
  @foreach ($options as $key => $value)
    <option value="{{ $value }}" @if ($value === $selected) selected @endif>{{ $key }}
    </option>
  @endforeach
</select>
