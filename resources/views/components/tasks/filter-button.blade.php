@php
$options = [
    'All statuses' => '',
    'Open' => 'Open',
    'In-Progress' => 'In-Progress',
    'Closed' => 'Closed',
];
@endphp

<div class="col-2">
  <x-forms.select class="d-inline" id="tasks_filter_button" name="tasks_filter" selected="{{request()->query('status')}}" :options="$options" />
</div>
