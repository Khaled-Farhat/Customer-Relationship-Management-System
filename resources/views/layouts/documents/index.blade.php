@section('button')
  <x-documents.upload-document :action="$action" class="mb-2" />
@endsection

@section('table')
    <x-documents.table :documents="$documents" />
@endsection
