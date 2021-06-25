@extends('layouts.app')

@php $active_sidebar = 'about'; @endphp

@section('css')
    <style>
        .session-messages {
            width: 80%;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            margin-left: auto;
        }
    </style>
@endsection

@section('content')
    @include('partials.nav')

    <div class="mt-3 session-messages">
        @include('partials.error-message')
        @include('partials.success-message')
    </div>

    

    <section id="about-header">
        <div class="container-fluid">
            <div class="image">
                <img class="img-fluid" src="img/covid-cells.jpg" alt="" />
            </div>
            <div class="px-2 py-5 text">
                <h1 class="text-center">خدماتنا</h1>
                <p style="text-align: right">
                    لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي
                    الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم
                    إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت
                    مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن
                    كتيّب بمثابة دليل أو مرجع شكلي لهذه . انتشر بشكل كبير في ستينيّات
                    هذا القرن لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل
                    "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص
                    لوريم إيبسوم.
                </p>
            </div>
        </div>
    </section>

    <section id="about-programmer">
        <div class="container">
            <h1 class="mb-5 text-center h1-header">برمجة وتطوير</h1>
            <div class="row">
                <div class="mx-auto mb-4 col-12 col-md-6 col-lg-4">
                    <div class="shadow card rounded-3">
                        <div class="mx-auto mt-4 overflow-hidden shadow img rounded-circle">
                            <img src="{{ asset('img/user.jpg') }}" class="" alt="" srcset="" />
                        </div>
                        <div class="card-body">
                            <h4 class="mt-3 mb-3 text-center">اسلام نعمان فهد</h4>
                            <p class="text-center">
                                خريج جامعة الانبار كلية علوم الحاسبات وتكنلوجيا المعلومات قسم
                                نضم المعلومات
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mx-auto mb-4 col-12 col-md-6 col-lg-4">
                    <div class="shadow card rounded-3">
                        <div class="mx-auto mt-4 overflow-hidden shadow img rounded-circle">
                            <img src="{{ asset('img/user.jpg') }}" class="" alt="" srcset="" />
                        </div>
                        <div class="card-body">
                            <h4 class="mt-3 mb-3 text-center">اسلام نعمان فهد</h4>
                            <p class="text-center">
                                خريج جامعة الانبار كلية علوم الحاسبات وتكنلوجيا المعلومات قسم
                                نضم المعلومات
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="connectWithUs">
        <div class="container">
            <h1 class="text-center h1-header">تواصل معنا</h1>
            <div class="shadow-lg card3">
                <!-- <div class="flex-row-reverse row"> -->

                <div class="right col-12 col-sm-12 col-md-12 col-lg-8">
                    <form action="{{ route('message.store') }}" method="post">
                        @csrf
                        @if (session('message-error'))
                            @if ($errors->any())
                                <div class="text-right alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endif
                        <div class="flex-row-reverse row justify-content-between">
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="mb-4 form-group">
                                    <input class="form-control" name="name" value="{{ old('name') }}" type="text" placeholder="الاسم الكامل" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="mb-4 form-group">
                                    <input class="form-control" name="phone" value="{{ old('phone') }}" type="text" placeholder="رقم الهاتف" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="mb-4 form-group">
                                    <input class="form-control" name="email" value="{{ old('email') }}" type="text" placeholder="البريد الالكتروني" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-4 form-group">
                                    <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="5np"
                                        placeholder="الوصف">{{ old('desc') }}</textarea>
                                </div>
                            </div>

                            <div class="mx-auto text-center d-inline-block">
                                <button type="submit" class="btn btn-info">أرسال</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="left col-12 col-sm-12 col-md-12 col-lg-4">
                    <h4>هل لديك أسئلة؟</h4>
                    <ul>
                        <li class="flex-row-reverse d-flex">
                            <i class="floatItem-icon fas fa-map-marker-alt"></i>
                            <p>هيت البغدادي</p>
                        </li>
                        <li class="flex-row-reverse d-flex">
                            <i class="floatItem-icon fas fa-phone"></i>
                            <p>9647800000000+</p>
                        </li>
                        <li class="flex-row-reverse d-flex">
                            <i class="floatItem-icon fas fa-at"></i>
                            <p>info@email.com</p>
                        </li>
                    </ul>
                </div>

                <!-- </div> -->
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection


@section('js')

@endsection
