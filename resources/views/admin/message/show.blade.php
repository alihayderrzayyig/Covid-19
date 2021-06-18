@extends('layouts.appAdmin')
@php $active_sidebar = ''; @endphp
@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">
            @include('partials.admin.side-bar')
            <div class="pl-0 admin-content col-9">
                <div class="container p-5">
                    <div class="mx-auto text-left card w-75">
                        <div class="card-body">
                            <p class="m-0">المرسل: {{ $message->name }}</p>
                            <p class="m-0">هاتف: {{ $message->phone }}</p>
                            <p class="m-0">
                                {{ $message->email }}
                                :
                                البريد الالكتروني
                            </p>
                            <p class="m-0">: الوصف</p>
                            <div class="px-2 border rounded">
                                <p>{{ $message->desc  }}</p>
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
        .session-messages {
            width: 90%;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            margin-left: auto
        }
    </style>
@endsection
