<div class="mb-3">
  <x-forms.text name="name" label="Name" :value="optional($organization)->name" />
</div>
<div class="mb-3">
  <x-forms.text name="address" label="Address" :value="optional($organization)->address" />
</div>
<div class="mb-3">
  <x-forms.text name="website" label="Website" :value="optional($organization)->website" />
</div>
<div class="mb-3">
  <x-forms.textarea name="description" label="Description" :value="optional($organization)->description" />
</div>
