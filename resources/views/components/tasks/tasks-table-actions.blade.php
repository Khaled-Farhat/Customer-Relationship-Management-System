<div {{ $attributes->merge([
    'class' => 'd-flex justify-content-between',
]) }}>
  <x-buttons.anchor :href="route('tasks.create')" content="Create task" color="success" />
  <x-tasks.filter-button />
</div>

@section('script')
  @parent
  document.getElementById('tasks_filter_button').addEventListener("change", function() {
    var status = this.value;
    var url = window.location.href.split('?')[0];

    if (status != '') {
      url += '?status=' + status;
    }

    window.location.replace(url);
  });
@endsection
