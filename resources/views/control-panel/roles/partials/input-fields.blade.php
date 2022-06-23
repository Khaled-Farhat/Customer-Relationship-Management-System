<div class="mb-3">
  <x-forms.text name="name" label="Name" :value="optional($role)->title" />
</div>
<div class="mb-3">
  <label class="form-label">Permissions</label>
  @foreach ($permissions as $permission)
    <x-forms.checkbox name="permissions[]" :value="$permission->title" :label="$permission->title"
      checked="{{ optional(optional($role)->abilities)->contains('title', $permission->title) }}" />
  @endforeach
</div>
