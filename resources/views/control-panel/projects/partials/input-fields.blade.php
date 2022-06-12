<div class="mb-3">
  <x-forms.text name="title" label="Title" :value="optional($project)->title" />
</div>
<div class="mb-3">
  <x-forms.select name="status_id" label="Status" :options="$statuses" :selected="optional(optional($project)->status)->id" />
</div>
<div class="mb-3">
  <x-forms.select name="client_id" label="Client" :options="$organizations" :selected="optional(optional($project)->client)->id" />
</div>
<div class="mb-3">
  <x-forms.select name="manager_id" label="Manager" :options="$users" :selected="optional(optional($project)->manager)->id" />
</div>
<div class="mb-3">
  <x-forms.date name="deadline" label="Deadline" :value="optional(optional($project)->deadline)->toDateString()" />
</div>
<div class="mb-3">
  <x-forms.textarea name="description" label="Description" :value="optional($project)->description" />
</div>
