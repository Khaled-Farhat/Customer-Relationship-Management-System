@props(['action', 'name' => 'document', 'button' => 'Upload'])

@can('create', App\Models\Document::class)
  <form method="POST" action="{{ $action }}" enctype="multipart/form-data" {{ $attributes }}>
    @csrf
    <div class="row g-2">
      <div class="col-auto">
        <x-forms.file name="{{ $name }}" />
      </div>
      <div class="col-auto">
        <x-buttons.submit content="{{ $button }}" color="success" />
      </div>
    </div>
  </form>
@endcan
