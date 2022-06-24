<div class="card">
  <div class="card-body d-flex pt-4">
    <div class="col-3 pe-2">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Task title</h6>
        <h2 class="card-subtitle">{{ $task->title }}</h2>
      </div>
      <div>
        @can('update', $task)
          <x-buttons.anchor :href="route('tasks.edit', $task)" content="Edit task" size="small" color="warning" class="my-1" />
        @endcan
        @can('delete', $task)
          <x-buttons.form :action="route('tasks.destroy', $task)" content="Delete task" size="small" color="danger" class="my-1" />
        @endcan
      </div>
    </div>
    <div class="col-2 px-3">
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Project</h6>
        <h6 class="card-subtitle">
          <a href="{{ route('projects.show', $task->project) }}">{{ $task->project->title }}</a>
        </h6>
      </div>
      <div class="align-bottom">
        <h6 class="card-subtitle text-muted mb-1">Assigned</h6>
        <h6 class="card-subtitle">
          @isset($task->user)
            @can('view', $task->user)
              <a href="{{ route('users.show', $task->user) }}">{{ $task->user->name }}</a>
            @else
              <p class="my-auto">{{ $task->user->name }}</p>
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
        <h6 class="card-subtitle">{{ $task->deadline->toDateString() }}</h6>
      </div>
      <div class="mb-3">
        <h6 class="card-subtitle text-muted mb-1">Created at</h6>
        <h6 class="card-subtitle">{{ $task->created_at->toDateString() }}</h6>
      </div>
      <div class="align-bottom">
        <h6 class="card-subtitle text-muted mb-1">Status</h6>
        <h6 class="card-subtitle">{{ $task->status->name }}</h6>
      </div>
    </div>
    <div class="ps-2">
      <h6 class="card-subtitle text-muted mb-1">Description</h6>
      <p class="card-subtitle">{{ $task->description }}</p>
    </div>
  </div>
</div>
