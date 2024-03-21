@extends('layouts.app')
@section('title', 'الملف الشخصي')
@section('content')
    <div class="row" dir="rtl">
        <div class="col-md-6 mx-auto">
            <div class="card bg-white p-4">
                <div class="text-center">
                    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="" width="82px" height="82px">
                    <h3 class="mt-4 fw-bold">{{ auth()->user()->name }}</h3>
                </div>
                <div class="card-body">
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for='name'>الاسم</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                            @error('name')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for='email'>البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                            @error('email')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for='password'>كلمة المرور</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for='password-confirmaton'>تأكيد كلمة المرور</label>
                            <input type="text" name="password-confirmaton" class="form-control">
                            @error('password-confirmation')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for='image'>تغيير الصورة الشخصية</label>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control">
                                <label for="image" class="form-label" data-browse="استعرض...">إستعرض</label>
                            </div>
                            @error('image')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-flex mt-5 flex-row-reverse">
                            <button type="submit" class="btn btn-primary mr-2">حفظ التغييرات</button>
                            <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج</button>
                        </div>
                    </form>
                    {{-- logout form --}}
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
