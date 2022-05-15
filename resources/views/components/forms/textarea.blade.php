<textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" rows="3">
@isset($model)
{{ $model->$name }}
@endisset
</textarea>
<x-forms.invalid-feedback :name="$name" />
