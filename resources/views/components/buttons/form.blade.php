@props(['action', 'content', 'color', 'size' => 'medium', 'method' => 'DELETE'])

@php
$buttonClass = 'btn btn-' . $color . ' bg-gradient';

if ($size === 'small') {
    $buttonClass .= ' btn-sm';
} elseif ($size === 'large') {
    $buttonClass .= ' btn-lg';
}
@endphp

<form method="POST" action="{{ $action }}" {{ $attributes->merge([
    'class' => 'd-inline',
]) }}>
  @csrf()
  @method($method)
  <button type="submit" class="{{ $buttonClass }}">{{ $content }}</button>
</form>
