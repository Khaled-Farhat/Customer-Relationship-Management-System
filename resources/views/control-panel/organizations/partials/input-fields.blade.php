<div class="mb-3">
    <x-forms.label name="name" label="Name" />
    <x-forms.text name="name" :model="$organization ?? null" />
</div>
<div class="mb-3">
    <x-forms.label name="website" label="Website" />
    <x-forms.text name="website" :model="$organization ?? null" />
</div>
<div class="mb-3">
    <x-forms.label name="address" label="Address" />
    <x-forms.text name="address" :model="$organization ?? null" />
</div>
<div class="mb-3">
    <x-forms.label name="description" label="Description" />
    <x-forms.textarea name="description" :model="$organization ?? null" />
</div>
