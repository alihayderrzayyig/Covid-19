@extends('layouts.appAdmin')
@php $active_sidebar = 'main'; @endphp
@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">
                    @include('partials.admin.success-m')
                    @include('partials.admin.error-m')
                    @if ($errors->any())
                        <div class="text-left alert alert-danger">
                            <ul class="m-0 list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h1 class="mb-4 text-center">{{ isset($protection) ? __('تحديث فرع') : __('إضافة خطوة وقايا') }}</h1>
                    <form
                        action="{{ isset($protection) ? route('admin.protection.update', $protection->id) : route('admin.protection.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($protection))
                            @method('PUT')
                        @endif
                        <div class="p-3 card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">العنوان</label>
                                        <input id="title" name="name" type="text" class="form-control"
                                            value="{{ isset($protection) ? $protection->name : '' }}">
                                    </div>
                                </div>

                                @if (isset($protection))
                                    <div class="col-12">
                                        <div class="form-group">
                                            <img src="{{ asset($protection->image) }}" alt="" srcset=""
                                                style="width: 100%; height: 25rem; border-radius: 5px">
                                        </div>
                                    </div>
                                @endif

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">إضافة صورة:</label>
                                        <input type="file" name="image" class="form-control-file"
                                            id="exampleFormControlFile1">
                                    </div>
                                </div>

                                <div class="mx-auto">
                                    <button type="submit"
                                        class="btn btn-submit">{{ isset($protection) ? 'تحديت' : 'حفظ' }}</button>
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
        .card {
            direction: rtl !important;
        }

    </style>
@endsection
