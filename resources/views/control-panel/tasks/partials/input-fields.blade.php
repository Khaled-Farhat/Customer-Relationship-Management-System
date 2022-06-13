<div class="mb-3">
  <x-forms.text name="title" label="Title" :value="optional($task)->title" />
</div>
<div class="mb-3">
  <x-forms.select name="status_id" label="Status" :options="$statuses" :selected="optional($task)->status_id" />
</div>
<div class="mb-3">
  <x-forms.select name="project_id" label="Project" :options="$projects" :selected="optional($task)->project_id" />
</div>
<div class="mb-3">
  <x-forms.select name="user_id" label="User" :options="$users" :selected="optional($task)->user_id" />
</div>
<div class="mb-3">
  <x-forms.date name="deadline" label="Deadline" :value="optional(optional($task)->deadline)->toDateString()" />
</div>
<div class="mb-3">
  <x-forms.textarea name="description" label="Description" :value="optional($task)->description" />
</div>
