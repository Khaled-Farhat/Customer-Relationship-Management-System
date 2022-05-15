<input type="email" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
<x-forms.invalid-feedback :name="$name" />
