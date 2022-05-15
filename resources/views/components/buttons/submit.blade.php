@props(['content', 'color'])

<button
  {{ $attributes->merge([
      'type' => 'submit',
      'class' => 'btn btn-' . $color . ' bg-gradient',
  ]) }}>{{ $content }}</button>
