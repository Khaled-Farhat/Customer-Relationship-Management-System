<div class="card">
  <div class="card-body d-flex pt-4">
    <div class="col-3 pe-2">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Project title</h6>
        <h2 class="card-subtitle">{{ $project->title }}</h2>
      </div>
      <div>
        @can('update', $project)
          <x-buttons.anchor :href="route('projects.edit', $project)" content="Edit project" size="small" color="warning" class="my-1" />
        @endcan
        @can('delete', $project)
          <x-buttons.form :action="route('projects.destroy', $project)" content="Delete project" size="small" color="danger" class="my-1" />
        @endcan
      </div>
    </div>
    <div class="col-2 px-3">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Client</h6>
        <h6 class="card-subtitle">
          @can('view', $project->client)
            <a href="{{ route('clients.show', $project->client) }}">{{ $project->client->name }}</a>
          @else
            <p class="my-auto">{{ $project->client->name }}</p>
          @endcan
        </h6>
      </div>
      <div class="align-bottom">
        <h6 class="card-subtitle text-muted mb-1">Manager</h6>
        <h6 class="card-subtitle">
          @isset($project->manager)
            @can('view', $project->manager)
              <a href="{{ route('users.show', $project->manager) }}">{{ $project->manager->name }}</a>
            @else
              <p class="my-auto">{{ $project->manager->name }}</p>
            @endcan
          @else
            Deleted user
          @endisset
        </h6>
      </div>
    </div>
    <div class="col-2 px-3">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Deadline</h6>
        <h6 class="card-subtitle">{{ $project->deadline->toDateString() }}</h6>
      </div>
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Created at</h6>
        <h6 class="card-subtitle">{{ $project->created_at->toDateString() }}</h6>
      </div>
      <div class="align-bottom">
        <h6 class="card-subtitle text-muted mb-1">Status</h6>
        <h6 class="card-subtitle">{{ $project->status->name }}</h6>
      </div>
    </div>
    <div class="ps-2">
      <h6 class="card-subtitle text-muted mb-1">Description</h6>
      <p class="card-subtitle">{{ $project->description }}</p>
    </div>
  </div>
</div>
