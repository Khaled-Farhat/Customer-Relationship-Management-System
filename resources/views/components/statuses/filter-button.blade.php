@php
$options = [
    'All statuses' => '',
    'Open' => 'Open',
    'In-Progress' => 'In-Progress',
    'Closed' => 'Closed',
];
@endphp

<div class="col-2 ms-auto">
  <x-forms.select class="d-inline" id="status_filter_button" name="status_filter" selected="{{request()->query('status')}}" :options="$options" />
</div>

@section('script')
  @parent
  document.getElementById('status_filter_button').addEventListener("change", function() {
    var status = this.value;
    var url = window.location.href.split('?')[0];

    if (status != '') {
      url += '?status=' + status;
    }

    window.location.replace(url);
  });
@endsection
