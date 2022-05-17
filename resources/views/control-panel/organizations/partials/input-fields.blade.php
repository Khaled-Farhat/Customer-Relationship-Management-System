<x-forms.text name="name" label="Name" :value="optional($organization)->name" class="mb-3" />
<x-forms.text name="address" label="Address" :value="optional($organization)->address" class="mb-3" />
<x-forms.text name="website" label="Website" :value="optional($organization)->website" class="mb-3" />
<x-forms.textarea name="description" label="Description" :value="optional($organization)->description" class="mb-3" />
