@extends('layouts.appAdmin')
@php $active_sidebar = 'admin-message'; @endphp
@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">
                    @include('partials.admin.success-m')

                    <h2 class="mb-3 text-center">الرسائل المستلمة</h2>

                    @if ($messags->count())
                        <div class="card">
                            <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">ت</th>
                                        {{-- <th scope="col">الصورة</th> --}}
                                        <th scope="col">الاسم</th>
                                        <th scope="col">هاتف</th>
                                        <th scope="col">البريد الالكتروني</th>
                                        <th scope="col">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messags as $item)
                                        <tr>
                                            <th scope="row">
                                                @if (!$item->reading) <span
                                                        style="color: red">new</span> @endif
                                                {{ $loop->index + 1 }}
                                            </th>
                                            {{-- <td><img style="height: 30px; width: 50px;" src="1" alt="" srcset=""></td> --}}
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td class="d-flex">
                                                <div class="flex ml-2 btn btn-info btn-table">
                                                    <form action="{{ route('admin.message.show', $item->id) }}"
                                                        method="post">
                                                        @method('put')
                                                        @csrf
                                                        <button type="submit"><i class="fas fa-eye"></i></button>
                                                    </form>
                                                </div>


                                                <form action="{{ route('admin.message.destroy', $item->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="flex ml-2 btn btn-danger btn-table">
                                                        <button onclick="return confirm('هل انت متاكد من عملية الحذف')"
                                                            type="submit"><i class="far fa-trash-alt"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>


                                        <!-- View Modal -->
                                        <div class="modal fade" id="messageShow{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="px-2 ml-auto">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="m-0">المرسل: {{ $item->name }}</p>
                                                        <p class="m-0">هاتف: {{ $item->phone }}</p>
                                                        <p class="m-0">البريد الالكتروني: {{ $item->email }}</p>
                                                        <p class="m-0">الوصف:</p>
                                                        <div class="px-2 border rounded">
                                                            <p>{{ $item->description }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex mx-auto mb-2 btn btn-danger btn-table btn-sm">
                                                        <button
                                                            onclick="handldelete2('/admin/message/{{ $item->id }}')"
                                                            data-toggle="modal" data-target="#deleteCategory">حذف</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- مودل الحذف --}}
                        @include('partials.admin.delete-model')
                        {{-- نهاية مودل الحذف --}}
                    @else
                        <h5 class="mb-3 text-center">لا يوجد رسائل ليتم عرضها</h5>
                    @endif

                </div>{{-- نهاية الكونتينر --}}

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

        .modal-body {
            direction: rtl
        }

        .modal-content .btn-table button {
            font-size: 1rem;
        }

    </style>
@endsection
@section('js')

@endsection
