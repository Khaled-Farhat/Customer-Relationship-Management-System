@props(['tasks'])

@if ($tasks->isEmpty())
  <div class="pt-3 pb-2">
    <h4 class="text-muted">No tasks found.</h4>
  </div>
@else
  <table class="table-hover table align-middle">
    <thead>
      <tr>
        <th>Title</th>
        <th>Project</th>
        <th>Assigned</th>
        <th>Deadline</th>
        <th>Created at</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task)
        <tr>
          <td>{{ $task->title }}</td>
          <td><a href="{{ route('projects.show', $task->project) }}">{{ $task->project->title }}</a></td>
          <td>
            @isset($task->user)
              <a href="{{ route('users.show', $task->user) }}">{{ $task->user->name }}</a>
            @else
              Deleted user
            @endisset
          </td>
          <td>{{ $task->deadline->toDateString() }}</td>
          <td>{{ $task->created_at->toDateString() }}</td>
          <td>{{ $task->status->name }}</td>
          <td>
            <x-buttons.anchor :href="route('tasks.show', $task)" content="Show" size="small" color="primary" />
            <x-buttons.anchor :href="route('tasks.edit', $task)" content="Edit" size="small" color="warning" />
            <x-buttons.form :action="route('tasks.destroy', $task)" content="Delete" size="small" color="danger" />
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $tasks->links() }}
@endif
