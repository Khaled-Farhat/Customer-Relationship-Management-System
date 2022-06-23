@props(['permissions'])

<div class="py-2">
  @forelse ($permissions as $permission)
    <button type="button" class="btn btn-light btn-sm m-1">{{ $permission->title }}</button>
  @empty
    <div class="pt-3 pb-2">
      <h4 class="text-muted">No permissions found.</h4>
    </div>
  @endforelse
</div>
