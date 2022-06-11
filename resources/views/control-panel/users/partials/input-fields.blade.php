<div class="mb-3">
  <x-forms.text name="name" label="Name" :value="optional($user)->name" />
</div>
<div class="mb-3">
  <x-forms.email name="email" label="Email" :value="optional($user)->email" />
</div>
<div class="mb-3">
  <x-forms.text name="phone" label="Phone number" :value="optional($user)->phone" />
</div>
<div class="mb-3">
  <x-forms.text name="address" label="Address" :value="optional($user)->address" />
</div>
<div class="mb-3">
  <x-forms.password name="password" label="Password" />
</div>
<div class="mb-3">
  <x-forms.password name="password_confirmation" label="Password confirmation" />
</div>
