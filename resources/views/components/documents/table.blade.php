@props(['documents'])

@if ($documents->isEmpty())
  <div class="pt-3 pb-2">
    <h4 class="text-muted">No documents found.</h4>
  </div>
@else
  <table class="table-hover table align-middle">
    <thead>
      <tr>
        <th>File name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($documents as $document)
        <tr>
          <td>
            @php
              $formId = 'document-' . $document->id;
            @endphp
            <form id="{{ $formId }}" method="POST" action="{{ route('documents.update', $document) }}">
              @csrf
              @method('PUT')
              <x-forms.text name="name" :value="$document->name" />
            </form>
          </td>
          <td>
            <x-buttons.anchor href="{{ route('documents.show', $document) }}" content="Download" size="small"
              color="success" download />
            <x-forms.submit :form="$formId" content="Rename" size="small" color="warning" />
            <x-buttons.form action="{{ route('documents.destroy', $document) }}" content="Delete" size="small"
              color="danger" />
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endempty