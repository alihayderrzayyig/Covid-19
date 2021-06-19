@extends('layouts.app')

@php $active_sidebar = ''; @endphp

@section('css')

@endsection

@section('content')
    @include('partials.nav')



    <section id="profile">
        <div class="container">
            <div class="profile-info" style="text-align: right">
                <div class="row">
                    <div class="col-4">
                        <h4>معلومات الحساب</h4>
                        <p>تحديث معلومات حسابك والبريد الالكتروني</p>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body w-75">
                                <form id="profile-update" action="{{ route('profile.update') }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">الاسم:</label>
                                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                            value="{{ auth()->user()->name }}" {{-- placeholder="name@example.com" --}} />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">هاتف:</label>
                                        <input type="text" name="phone" class="form-control" id="exampleFormControlInput1"
                                            value="{{ auth()->user()->phone }}" {{-- placeholder="name@example.com" --}} />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">البريد الالكتروني:</label>
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                            value="{{ auth()->user()->email }}" {{-- placeholder="name@example.com" --}} />
                                    </div>

                                </form>
                            </div>
                            <div class="card-footer" style="text-align: left">
                                <div class="col-auto">
                                    <button type="submit" form="profile-update" class="btn btn-dark">
                                        حفظ التعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br />
                <div class="dropdown-divider"></div>
                <br />

                <div class="row">
                    <div class="col-4">
                        <h4>كلمة السر</h4>
                        <p>تحديث كلمة السر</p>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body w-75">
                                <form id="password-update" action="{{ route('password.update2') }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">كلمة السر الحالية</label>
                                        <input type="password" name="current_password" class="form-control" id="exampleFormControlInput1" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">كلمة السر الجديدة</label>
                                        <input type="password" name="new_password" class="form-control" id="exampleFormControlInput1" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">أعد كتابة كلمة السر</label>
                                        <input type="password" name="new_confirm_password" class="form-control" id="exampleFormControlInput1" />
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer" style="text-align: left">
                                <div class="col-auto">
                                    <button type="submit" form="password-update" class="btn btn-dark">
                                        حفظ التعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @include('partials.footer')
@endsection


@section('js')
@endsection
