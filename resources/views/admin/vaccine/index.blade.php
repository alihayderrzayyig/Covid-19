@extends('layouts.appAdmin')

@php $active_sidebar = 'vaccine'; @endphp

@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">

            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">


                    {{-- <h1>{{ auth()->user()->authUserLogin() }}</h1> --}}

                    <div class="mb-3">
                        <a href="{{ route('admin.vaccine.create') }}" class="btn btn-success">إضافة لقاح</a>
                    </div>
                    {{-- فورم البحث --}}
                    <form action="{{ route('admin.vaccine.index') }}" method="get" class="mb-4">
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

                    @if ($vaccines->count())
                        <div class="card">
                            <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">ت</th>
                                        <th scope="col">الشركة المصنعة</th>
                                        <th scope="col">العنوان</th>
                                        <th scope="col">الاجراء</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($vaccines)
                                        @foreach ($vaccines as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}
                                                </td>
                                                <td>{{ $item->sub_title }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td class="d-flex">
                                                    <div class="flex ml-2 btn btn-info btn-table">
                                                        <a href="{{ route('admin.vaccine.show', $item->id) }}"><i
                                                                class="fas fa-eye"></i></a>
                                                    </div>
                                                    <div class="flex ml-2 btn btn-warning btn-table ">
                                                        <a href="{{ route('admin.vaccine.edit', $item->id) }}"><i
                                                                class="fas fa-cog"></i></a>
                                                    </div>
                                                    <form action="{{ route('admin.vaccine.destroy', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="flex ml-2 btn btn-danger btn-table">
                                                            <button onclick="return confirm('هل انت متاكد من عملية الحذف')"
                                                                type="submit"><i class="far fa-trash-alt"></i></button>
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
                    {{-- <div class="mt-3 paginet">
                        {{ $users->appends(['search' => request()->query('search')])->links() }}
                    </div> --}}
                </div>


            </div>
        </div>
    </section>
@endsection
