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






                {{-- قسم القائمين على الموقع --}}
                <div class="container p-5">
                    <h2 class="mb-4 text-center">تعديل قسم الوقايه من فيروس كورانا</h2>
                    <div class="mb-3">
                        <a href="{{ route('admin.protection.create') }}" class="btn btn-success">إضافة خطوة وقاية</a>
                    </div>
                    {{-- @if ($responsibles->count()) --}}
                    @if ($protections->count())
                        <div class="card">
                            <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">ت</th>
                                        <th scope="col">الصورة</th>
                                        <th scope="col">العنوان</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($protections as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <img style="width: 40px; height: 30px;" src="{{ asset($item->image) }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td class="d-flex">

                                                <div class="flex ml-2 btn btn-warning btn-table ">
                                                    <a href="{{ route('admin.protection.edit', $item->id) }}"><i
                                                            class="fas fa-cog"></i></a>
                                                </div>

                                                <form action="{{ route('admin.protection.destroy', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="flex ml-2 btn btn-danger btn-table">
                                                        <button onclick="return confirm('هل انت متاكد من عملية الحذف')"
                                                            type="submit"><i class="far fa-trash-alt"></i></button>
                                                        {{-- <button onclick="handldelete2('project/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button> --}}
                                                    </div>
                                                </form>
                                                {{-- <div class="flex ml-2 btn btn-danger btn-table">
                                                    <button onclick="handldelete2('#')" data-toggle="modal"
                                                        data-target="#deleteCategory"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </div> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    @else
                        <h5 class="mb-4 text-center">لا توجد خطوات وقايا ليتم عرضها</h5>
                    @endif
                </div>




                {{-- قسم لقطة منجزات --}}
                <div class="container p-5" style="background-color: rgb(220, 230, 247)">
                    <h2 class="mb-4 text-center">تعديل قسم أعراض فيروس كورانا</h2>

                    <div class="mb-3">
                        <a href="{{ route('admin.symptom.create') }}" class="btn btn-success">إضافة عرض</a>
                    </div>
                    @if ($symptoms->count())
                        <div class="card">
                            <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">ت</th>
                                        <th scope="col">الصورة</th>
                                        <th scope="col">العنوان</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($symptoms as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <img style="width: 40px; height: 30px;" src="{{ asset($item->image) }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td class="d-flex">

                                                <div class="flex ml-2 btn btn-warning btn-table ">
                                                    <a href="{{ route('admin.symptom.edit', $item->id) }}"><i
                                                            class="fas fa-cog"></i></a>
                                                </div>

                                                <form action="{{ route('admin.symptom.destroy', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="flex ml-2 btn btn-danger btn-table">
                                                        <button onclick="return confirm('هل انت متاكد من عملية الحذف')"
                                                            type="submit"><i class="far fa-trash-alt"></i></button>
                                                        {{-- <button onclick="handldelete2('project/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button> --}}
                                                    </div>
                                                </form>
                                                {{-- <div class="flex ml-2 btn btn-danger btn-table">
                                                    <button onclick="handldelete2('#')" data-toggle="modal"
                                                        data-target="#deleteCategory"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </div> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    @else
                        <h5 class="mb-4 text-center">لا توجد خطوات وقايا ليتم عرضها</h5>
                    @endif







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
