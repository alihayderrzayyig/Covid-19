@extends('layouts.appAdmin')

@php $active_sidebar = 'users'; @endphp

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
                                    <div class="row justify-content-between">

                                        <div class="col-sm-12">
                                            <div class="form-group w-75">
                                                <label for="name">الاسم الثلاثي:</label>
                                                <p class="form-control">{{ $user->name }}</p>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group w-75">
                                                <label for="phone">رقم الهاتف:</label>
                                                <p class="form-control">
                                                    {{ $user->phone }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group w-75">
                                                <label for="phone">البريد الالكتروني:</label>
                                                <p class="form-control">{{ $user->email }}</p>
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
