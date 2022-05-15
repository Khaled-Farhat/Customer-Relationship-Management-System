<input type="text" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
  @isset($model) value="{{ $model->$name }}" @endisset>
<x-forms.invalid-feedback :name="$name" />
