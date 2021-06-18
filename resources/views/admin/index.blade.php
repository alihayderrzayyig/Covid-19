@extends('layouts.appAdmin')
@php $active_sidebar = 'main'; @endphp
@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">
            @include('partials.admin.side-bar')
            <div class="pl-0 admin-content col-9">
                <div class="mt-3 session-messages">
                    @include('partials.error-message')
                    @include('partials.success-message')
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



@section('js')
    <script>
        function handledit(id) {
            // console.log(id)
            var form = document.getElementById('editImage')
            form.action = 'admin/achievements?image=' + id
        }

        function handldelete2(id) {
            // console.log(id)
            var form = document.getElementById('formedeletecategoy')
            form.action = id
        }

    </script>
@endsection
