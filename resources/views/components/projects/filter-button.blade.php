@php
$options = [
    'All statuses' => '',
    'Open' => 'Open',
    'In-Progress' => 'In-Progress',
    'Closed' => 'Closed',
];
@endphp

<div class="col-2">
  <x-forms.select class="d-inline" id="project_filter_button" name="project_filter" selected="{{request()->query('status')}}" :options="$options" />
</div>
