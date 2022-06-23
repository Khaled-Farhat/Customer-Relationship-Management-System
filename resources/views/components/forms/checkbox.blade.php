@props(['name', 'label' => null, 'value' => null, 'checked' => false, 'hasFeedback' => true])

<div class="form-check">
  <input name="{{ $name }}" class="form-check-input" type="checkbox" value="{{ $value }}" id="flexCheckDefault"
    {{ $checked == true ? 'checked' : '' }}>
  <label class="form-check-label">
    {{ $label }}
  </label>
</div>

@if ($hasFeedback)
  <x-forms.invalid-feedback :name="$name" />
@endif
