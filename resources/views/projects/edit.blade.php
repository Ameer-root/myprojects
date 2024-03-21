@extends('layouts.app')
@section('title', 'تعديل المشروع')

@section('content')
    <div class="row justify-content-center text-right">
        <div class="col-8">
            <div class="card p-4 bg-white">
                <h3 class="text-center pb-5 fw-bold">مشروع جديد</h3>
                <form action="/projects/{{ $project->id }}" method="POST" dir="rtl">
                    @method('PATCH')
                    @include('projects.form')
                    <div class="form-group mb-3 d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary">تعديل</button>
                        <a href="/projects" class="btn btn-light">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
