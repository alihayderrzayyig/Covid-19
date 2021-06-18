@extends('layouts.app')
@php $active_sidebar = 'vaccine'; @endphp

@section('css')

@endsection

@section('content')
    @include('partials.nav')

    <section id="vaccine-header">
        <div class="p-0 m-0 container-fluid">
            <div class="img">
                <img src="img/vaccine.jpg" alt="" srcset="" />
            </div>
            <div class="header">
                <h1 class="text-center text-white h1-header">انواع اللقاحات</h1>
                <h3 class="text-center text-white h1-header">
                    Covid - <span>19</span>
                </h3>
            </div>
        </div>
    </section>

    <section id="vaccine-type" style="text-align: right">
        <div class="container">
            <div class="text">
                <h3>هنالك عدة عوامل تحدد الفرق بين لقاح وآخر</h3>
                <ol>
                    <li>
                        <p>
                            الفعالية: وهي النسبة المئوية للحد من المرض في مجموعة من الأشخاص
                            الذين تلقوا اللقاح مقارنة بالمجموعة التي لم تتلقَّ اللقاح.
                        </p>
                    </li>
                    <li>
                        <p>عدد جرعات اللقاح.</p>
                    </li>
                    <li>
                        <p>السعر.</p>
                    </li>
                    <li>
                        <p>درجة الحرارة اللازمة للتخزين.</p>
                    </li>
                </ol>
                <p>
                    ويظهر الجدول المرفق مقارنة بين اللقاحات التالية، ونشير إلى أن هذه
                    الأرقام تقريبية، وقد تتغير بناء على تغير الدراسات أو أسعار البيع أو
                    ظهور معطيات جديدة:
                </p>
            </div>

            <div class="p-3 m-0 mt-5 border">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">الشركة المصنعة</th>
                            <th scope="col">عدد الجرعات</th>
                            <th scope="col">الفعالية</th>
                            <th scope="col">درجة الحرارة</th>
                            <th scope="col">السعر للجرعة الواحدة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vaccines as $item)
                            <tr>
                                <th scope="row">{{ $item->sub_title }}</th>
                                <td>{{ $item->number_of_doses }}</td>
                                <td>{{ $item->Effectiveness }}%</td>
                                <td>{{ $item->temperature }}</td>
                                <td>{{ $item->price }}$</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="des">
                @foreach ($vaccines as $item)
                    <h2>
                        {{ $loop->index +1 }} - {{ $item->title }}
                    </h2>
                    <p>
                        {{ $item->desc }}
                    </p>
                
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection


@section('js')

@endsection
