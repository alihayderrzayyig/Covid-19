@extends('layouts.appAdmin')

@php $active_sidebar = 'doctor'; @endphp

@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">
                    <div id="profil">
                        <div class="container">
                            <div class="px-3 py-5 shadow card">
                                <div class="card2">
                                    <center>
                                        
                                        @if (isset($doctor))
                                            <div class="mb-4 mx-aut ">
                                                <img src="{{ asset($doctor->image) }}" class="shadow rounded-circle" height="250" width="250" alt=""
                                                    srcset="">
                                            </div>
                                        @endif
                                    </center>
                                    <div class="row justify-content-between">

                                        <div class="col-sm-12">
                                            <div class="form-group w-75">
                                                <label for="name">الاسم:</label>
                                                <p class="form-control">{{ $doctor->name }}</p>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group w-75">
                                                <label for="phone">رقم الهاتف:</label>
                                                <p class="form-control">
                                                    {{ $doctor->phone }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group w-75">
                                                <label for="phone">الاختصاص:</label>
                                                <p class="form-control">{{ $doctor->specialty }}</p>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group w-75">
                                                <label for="phone">السكن:</label>
                                                <p class="form-control">{{ $doctor->location }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    </script>

@endsection
