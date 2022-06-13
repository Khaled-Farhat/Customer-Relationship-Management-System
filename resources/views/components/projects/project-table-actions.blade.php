<div {{ $attributes->merge([
    'class' => 'd-flex justify-content-between',
]) }}>
  <x-buttons.anchor :href="route('projects.create')" content="Create project" color="success" />
  <x-projects.filter-button />
</div>

@section('script')
  @parent
  document.getElementById('project_filter_button').addEventListener("change", function() {
    var status = this.value;
    var url = window.location.href.split('?')[0];

    if (status != '') {
      url += '?status=' + status;
    }

    window.location.replace(url);
  });
@endsection
