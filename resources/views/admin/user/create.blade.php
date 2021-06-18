@extends('layouts.appAdmin')

@php $active_sidebar = 'users'; @endphp

@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">
                    @include('partials.admin.success-m')
                    <form
                        action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($user))
                            @method('PUT')
                        @endif
                        @if ($errors->any())
                            <div class="text-left alert alert-danger">
                                <ul class="m-0 list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="px-3 py-5 shadow card">


                            {{-- @method('PUT') --}}
                            {{-- <div class=""> --}}
                            <div class="row justify-content-between">

                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="name">الاسم الثلاثي:</label>
                                        <input id="name" name="name" class="form-control" type="text"
                                            value="{{ isset($user) ? $user->name : old('name') }}">
                                        {{-- <p class="form-control">{{ $user->name }}</p> --}}
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="phone">رقم الهاتف:</label>
                                        <input id="phone" name="phone" class="form-control" type="text"
                                            value="{{ isset($user) ? $user->phone : old('phone') }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="email">البريد الالكتروني:</label>
                                        <input id="email" name="email" class="form-control" type="email"
                                            value="{{ old('email') }}"
                                            placeholder="{{ isset($user) ? $user->email : '' }}">
                                    </div>
                                </div>


                                @if (isset($user))
                                    <div class="col-12 ">
                                        <p class="m-0">أذا كنت ترغب بتغيير كلمة السر</p>
                                    </div>
                                @endif
                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label
                                            for="password">{{ isset($user) ? __('كلمة السر الجديدة:') : __('كلمة السر:') }}</label>
                                        <input id="password" name="password" class="form-control" type="password" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="password2">أعد كتابة كلمة السر:</label>
                                        <input id="password2" name="password_confirmation" class="form-control"
                                            type="password" value="">
                                    </div>
                                </div>



                                <div class="col-12">
                                    <div class="form-group w-75 form-check">
                                        <input name="isAdmin" type="checkbox" class="form-check-input" id="exampleCheck1"
                                            @if (isset($user) && $user->isAdmin) checked @endif>
                                        <label class="ml-2 form-check-label" for="exampleCheck1">اجعل مسؤول</label>
                                    </div>
                                </div>

                                <div class="mx-auto">
                                    <button type="submit"
                                        class="btn btn-primary btn-block">{{ isset($user) ? __('تحديث') : __('حفظ') }}</button>
                                </div>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('css')
    <style>
        .modal-header .close {
            padding: 1rem 1rem;
            margin: -1rem -1rem -1rem -1rem;
        }

        .card .row,
        .card .card-body,
        .card .card-header,
        .card .card-footer {
            direction: rtl;
        }

    </style>
@endsection



@section('js')

    <script>
        $(document).ready(function() {
            $('select[name="governorate"]').on('change', function() {
                // console.log('ali');
                var governorate_id = $(this).val();
                if (governorate_id) {
                    // console.log(governorate_id);
                    $.ajax({
                        url: '/district/' + governorate_id + '/get',
                        type: 'POST',
                        data: {
                            somefield: "Some field value",
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('select[name="district"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                }
            });
        });

    </script>

@endsection
