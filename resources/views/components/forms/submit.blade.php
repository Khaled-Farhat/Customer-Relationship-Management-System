@props(['content', 'color', 'size' => 'medium'])

@php
if ($size === 'small') {
    $attributes = $attributes->merge(['class' => ' btn-sm']);
} elseif ($size === 'large') {
    $attributes = $attributes->merge(['class' => ' btn-lg']);
}
@endphp

<input type="submit" value="{{ $content }}"
  {{ $attributes->merge([
      'class' => 'btn btn-' . $color . ' bg-gradient',
  ]) }}>
