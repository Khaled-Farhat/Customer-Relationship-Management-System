<div class="mb-3">
  <x-forms.text name="name" label="Name" :value="optional($client)->name" />
</div>
<div class="mb-3">
  <x-forms.email name="email" label="Email" :value="optional($client)->email" />
</div>
<div class="mb-3">
  <x-forms.text name="phone" label="Phone" :value="optional($client)->phone" />
</div>
<div class="mb-3">
  <x-forms.select name="organization_id" label="Organization" :options="$organizations" :selected="optional(optional($client)->organization)->id" />
</div>
