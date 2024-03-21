<div class="card-footer bg-transparent" dir="rtl">
    <div class="d-flex">
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="">
            <div class="me-2">
                {{ $project->created_at->diffForHumans() }}
            </div>
        </div>

        <div class="d-flex align-items-center me-4">
            <img src="/images/list-check.svg" alt="">
            <div class="me-2">
                {{ count($project->tasks) ?? 0 }}
            </div>
        </div>

        <div class="d-flex align-items-center me-auto">
            <form action="/projects/{{ $project->id }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn btn-delete" value=''>
            </form>
        </div>
    </div>
</div>
