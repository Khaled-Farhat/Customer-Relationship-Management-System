@props(['documents'])

@error('name')
  <x-alerts.toast :message="$message" color="danger" />
@enderror

@if ($documents->isEmpty())
  <div class="pt-3 pb-2">
    <h4 class="text-muted">No documents found.</h4>
  </div>
@else
  <div class="table-responsive">
    <table class="table-hover table align-middle">
      <thead>
        <tr>
          <th>File name</th>
          <th>Uploaded at</th>
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
                <input type="text" name="name" value="{{ $document->name }}" class="form-control">
              </form>
            </td>
            <td>
              {{ $document->created_at->toDateString() }}
            </td>
            <td>
              <div class="d-flex gap-1">
                @can('view', $document)
                  <x-buttons.anchor href="{{ route('documents.show', $document) }}" content="Download" size="small"
                    color="success" download />
                @endcan
                @can('update', $document)
                  <x-forms.submit :form="$formId" content="Rename" size="small" color="warning" />
                @endcan
                @can('delete', $document)
                  <x-buttons.form action="{{ route('documents.destroy', $document) }}" content="Delete" size="small"
                    color="danger" />
                @endcan
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $documents->links() }}
@endif
