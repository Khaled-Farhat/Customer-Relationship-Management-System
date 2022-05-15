@props(['content', 'color', 'size' => 'medium'])

@php
if ($size === 'small') {
    $attributes = $attributes->merge(['class' => ' btn-sm']);
} elseif ($size === 'large') {
    $attributes = $attributes->merge(['class' => ' btn-lg']);
}
@endphp

<a {{ $attributes->merge([
    'class' => 'btn btn-' . $color . ' bg-gradient',
]) }}>
  {{ $content }}
</a>
