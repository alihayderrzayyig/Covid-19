@extends('layouts.appAdmin')

@php $active_sidebar = 'doctor'; @endphp

@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">

            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">


                    {{-- <h1>{{ auth()->user()->authUserLogin() }}</h1> --}}

                    <div class="mb-3">
                        <a href="{{ route('admin.doctor.create') }}" class="btn btn-success">إضافة طبيب معتمد</a>
                    </div>
                    {{-- فورم البحث --}}
                    <form action="{{ route('admin.doctor.index') }}" method="get" class="mb-4">
                        <div class="flex-row-reverse mb-3 input-group">
                            <input type="text" name="search" class="form-control" placeholder=""
                                value="{{ request()->query('search') }}" aria-label="Example text with button addon"
                                aria-describedby="button-addon1">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary" type="submit" id="button-addon1"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    @if ($doctors->count())
                        <div class="card">
                            <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">ت</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">الهاتف</th>
                                        <th scope="col">الاختصاص</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($doctors)
                                        @foreach ($doctors as $user)
                                            <tr>
                                                <td>{{ ($doctors->currentPage() - 1) * $doctors->perPage() + $loop->index + 1 }}
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->specialty }}</td>
                                                <td class="d-flex">
                                                    {{-- @if ($user->profile->completed) --}}
                                                    <div class="flex ml-2 btn btn-info btn-table">
                                                        <a href="{{ route('admin.doctor.show', $user->id) }}"><i
                                                                class="fas fa-eye"></i></a>
                                                    </div>

                                                    <div class="flex ml-2 btn btn-warning btn-table ">
                                                        <a href="{{ route('admin.doctor.edit', $user->id) }}"><i
                                                                class="fas fa-cog"></i></a>
                                                    </div>

                                                    <form action="{{ route('admin.doctor.destroy', $user->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="flex ml-2 btn btn-danger btn-table">
                                                            <button onclick="return confirm('هل انت متاكد من عملية الحذف')"
                                                                type="submit"><i class="far fa-trash-alt"></i></button>
                                                            {{-- <button onclick="handldelete2('project/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button> --}}
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset

                                </tbody>
                            </table>
                        </div>
                    @else
                        <h5 class="text-center">لا يوجد اي مستخدم ليتم عرضة</h5>
                    @endif
                    <div class="mt-3 paginet">
                        {{ $doctors->appends(['search' => request()->query('search')])->links() }}
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
