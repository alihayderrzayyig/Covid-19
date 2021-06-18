@extends('layouts.appAdmin')

@php $active_sidebar = 'vaccine'; @endphp

@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">
                    @include('partials.admin.success-m')
                    <form
                        action="{{ isset($vaccine) ? route('admin.vaccine.update', $vaccine->id) : route('admin.vaccine.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($vaccine))
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
                            <div class="row justify-content-between">
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label for="title">العنوان:</label>
                                        <input id="title" name="title" class="form-control" type="text"
                                            value="{{ isset($vaccine) ? $vaccine->title : old('title') }}">
                                        {{-- <p class="form-control">{{ $user->name }}</p> --}}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="sub_title">الشركة المصنعة:</label>
                                        <input id="sub_title" name="sub_title" class="form-control" type="text"
                                            value="{{ isset($vaccine) ? $vaccine->sub_title : old('sub_title') }}">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="number_of_doses">عدد الجرعات:</label>
                                        <input id="number_of_doses" name="number_of_doses" class="form-control"
                                            type="number"
                                            value="{{ isset($vaccine) ? $vaccine->number_of_doses : old('number_of_doses') }}"
                                            {{-- value="{{ old('number_of_doses') }}" --}}>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="Effectiveness">{{ __('الفعالية:') }}</label>
                                        <input id="Effectiveness" name="Effectiveness" class="form-control" type="number"
                                            value="{{ isset($vaccine) ? $vaccine->Effectiveness : old('Effectiveness') }}">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="price">السعر:</label>
                                        <input id="price" name="price" class="form-control" type="number" 
                                        value="{{ isset($vaccine) ? $vaccine->price : old('price') }}">
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="form-group w-50">
                                        <label for="temperature">درجة الحرارة:</label>
                                        <input id="temperature" name="temperature" class="form-control" type="text"
                                            value="{{ isset($vaccine) ? $vaccine->temperature : old('temperature') }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="desc">الوصف:</label>
                                        <textarea name="desc" id="desc" rows="5"
                                            class="form-control">{{ isset($vaccine) ? $vaccine->desc : old('desc') }}</textarea>
                                    </div>
                                </div>

                                <div class="mx-auto">
                                    <button type="submit"
                                        class="btn btn-primary btn-block">{{ isset($vaccine) ? __('تحديث') : __('حفظ') }}</button>
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
