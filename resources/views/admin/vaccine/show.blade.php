@extends('layouts.appAdmin')
@php $active_sidebar = 'vaccine'; @endphp
@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">
            @include('partials.admin.side-bar')
            <div class="pl-0 admin-content col-9">
                <div class="container p-5">
                    <div class="mx-auto text-left card w-75">
                        <div class="card-body" style="direction: rtl">
                            <p class="m-0"><span style="font-weight: 600">العنوان:</span> {{ $vaccine->title }}</p>
                            <p class="m-0"><span style="font-weight: 600">الشركة المصنعة:</span> {{ $vaccine->sub_title }}</p>
                            <p class="m-0"><span style="font-weight: 600">عدد الجرع:</span> {{ $vaccine->number_of_doses }}
                            <p class="m-0"><span style="font-weight: 600">الفعالية:</span> {{ $vaccine->Effectiveness }}</p>
                            <p class="m-0"><span style="font-weight: 600">درجة الحرارة:</span> {{ $vaccine->temperature }}</p>
                            <p class="m-0"><span style="font-weight: 600">سعر الجرعة:</span> {{ $vaccine->price }}</p>
                            </p>
                            <p class="m-0"><span style="font-weight: 600">الوصف:</span></p>
                            <div class="px-2 border rounded">
                                <p>{{ $vaccine->desc  }}</p>
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
