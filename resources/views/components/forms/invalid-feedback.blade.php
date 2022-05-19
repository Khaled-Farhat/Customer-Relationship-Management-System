@props(['name'])

@error($name)
  <div class="invalid-feedback">{{ $message }}</div>
@enderror
