@extends('layouts.appAdmin')

@php $active_sidebar = 'counting'; @endphp

@section('content')
    <section id="admin">
        <div class="flex-row-reverse row">

            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">

                    <form action="{{ route('admin.counting.index') }}" method="get" class="mb-4">
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

                    @if ($counting->count())
                        <div class="card">
                            <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">ت</th>
                                        <th scope="col">المحافضة</th>
                                        <th scope="col">الاصابات</th>
                                        <th scope="col">الشفاء</th>
                                        <th scope="col">الوفيات</th>
                                        <th scope="col">تعديل</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($counting)
                                        @foreach ($counting as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->injury }}</td>
                                                <td>{{ $item->recovery }}</td>
                                                <td>{{ $item->deaths }}</td>
                                                <td>
                                                    <div class="flex ml-2 btn btn-warning btn-table ">
                                                        <a href="{{ route('admin.counting.edit', $item->id) }}"><i class="fas fa-cog"></i></a>
                                                    </div>
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
                </div>
            </div>
        </div>
    </section>
@endsection
