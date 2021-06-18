@extends('layouts.appAdmin')

@php $active_sidebar = 'counting'; @endphp

@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">
                    @include('partials.admin.success-m')
                    <form action="{{ route('admin.counting.update', $counting->id) }}" method="post">
                        @method('PUT')
                        @csrf
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

                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="name">المحافضة:</label>
                                        <input id="name" class="form-control" type="text" disabled value="{{ $counting->name }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="name">عدد الوفيات:</label>
                                        <input id="name" class="form-control" type="text" name="deaths"
                                            value="{{ $counting->deaths }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="name">عدد الاصابات:</label>
                                        <input id="name" class="form-control" type="text" name="injury"
                                            value="{{ $counting->injury }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group w-75">
                                        <label for="name">حالات الشفاء:</label>
                                        <input id="name" class="form-control" type="text" name="recovery"
                                            value="{{ $counting->recovery }}">
                                    </div>
                                </div>

                                <div class="mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">{{ __('تحديث') }}</button>
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
