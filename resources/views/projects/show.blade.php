@extends('layouts.app')
@section('title', $project->title)
@section('content')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/projects">المشاريع / {{ $project->title }}</a>
        </div>
        <div>
            <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary px-4" role="button">تعديل المشروع</a>
        </div>
    </header>

    <section class="row text-right" dir="rtl">
        <div class="col-lg-4">

            <div class="card">
                <div class="card-body bg-white">
                    <div class="status">
                        @switch($project->status)
                            @case(1)
                                <span class="text-success">مكتمل</span>
                            @break

                            @case(2)
                                <span class="text-danger">ملغي</span>
                            @break

                            @default
                                <span class="text-warning">قيد الإنجاز</span>
                        @endswitch
                        <h5 class="fw-bold card-title">
                            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                        </h5>

                        <div class="card-text mt-4">{{ $project->description }}</div>

                    </div>
                </div>
                @include('projects.footer')

            </div>
            <div class="card bg-white mt-4">
                <div class="card-body">
                    <h5 class="fw-bold">تغيير حالة المشروع</h5>
                    <form action="projects/{{ $project->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="0" {{ $project->status == 0 ? 'selected' : '' }}>قيد الإنجاز</option>
                            <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>مكتمل</option>
                            <option value="2" {{ $project->status == 2 ? 'selected' : '' }}>ملغي</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @foreach ($project->tasks as $task)
                <div class="card d-flex flex-row bg-white mt-3 p-4 align-items-center">
                    <div class="{{ $task->completed ? 'text-decoration-line-through muted' : '' }}">
                        {{ $task->name }}
                    </div>
                    <div class="me-auto">
                        <form action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" name="completed" class="form-check-input ml-4"
                                @checked($task->completed) onchange="this.form.submit()">
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <form action="/projects/{{ $task->project_id }}/tasks/{{ $task->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-delete mt-1" value=''>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="card mt-4 bg-white">
                <form action="/projects/{{ $project->id }}/tasks" method="POST" class="d-flex p-3">
                    @csrf
                    <input type="text" name="name" class="form-control p-2 ms-2 border-0"
                        placeholder="أضف مهمة جديدة">
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </form>
            </div>
        </div>
    </section>
@endsection
