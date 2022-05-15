<input type="password" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
<x-forms.invalid-feedback :name="$name" />
