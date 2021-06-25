@extends('layouts.appAdmin')

@php $active_sidebar = 'doctor'; @endphp

@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">
                    @include('partials.admin.success-m')
                    <form
                        action="{{ isset($doctor) ? route('admin.doctor.update', $doctor->id) : route('admin.doctor.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($doctor))
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
                            @if (isset($doctor))
                                <div class="mx-auto mb-4">
                                    <img src="{{ asset($doctor->image) }}" class="shadow rounded-circle" height="250" width="250" alt="" srcset="">
                                </div>
                            @endif
                            <div class="row justify-content-between">

                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="name">الاسم:</label>
                                        <input id="name" name="name" class="form-control" type="text"
                                            value="{{ isset($doctor) ? $doctor->name : old('name') }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="phone">رقم الهاتف:</label>
                                        <input id="phone" name="phone" class="form-control" type="text"
                                            value="{{ isset($doctor) ? $doctor->phone : old('phone') }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="specialty">الاختصاص:</label>
                                        <input id="specialty" name="specialty" class="form-control" type="text"
                                            value="{{ isset($doctor) ? $doctor->specialty : old('specialty') }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="location">السكن:</label>
                                        <input id="location" name="location" class="form-control" type="text"
                                            value="{{ isset($doctor) ? $doctor->location : old('location') }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">إضافة صورة:</label>
                                        <input type="file" name="image" class="form-control-file"
                                            id="exampleFormControlFile1">
                                    </div>
                                </div>

                                <div class="mx-auto">
                                    <button type="submit"
                                        class="btn btn-primary btn-block">{{ isset($doctor) ? __('تحديث') : __('حفظ') }}</button>
                                </div>
                            </div>
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
@endsection
