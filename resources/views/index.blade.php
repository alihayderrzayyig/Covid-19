@extends('layouts.app')

@php $active_sidebar = 'index'; @endphp

@section('css')
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />
    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
        }

        .slider {
            width: 100%;
            margin: 1rem auto;
            padding: 0 5rem;
        }

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }

        .slick-slide {
            transition: all ease-in-out 0.3s;
            opacity: 0.2;
        }

        .slick-active {
            opacity: 1;
        }

        .slick-current {
            opacity: 1;
        }

        .bg-red {
            background-color: rgba(255, 0, 0, 0.479) !important;
        }

        .bg-black {
            background-color: rgba(0, 0, 0, 0.397) !important;
        }

        .slick-next {
            right: 0;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .slick-prev {
            left: 0;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .slick-next,
        .slick-prev {
            background-color: rgba(61, 49, 49, 0.659);
            height: 90px;
            width: 60px;
        }

        .slick-next:hover,
        .slick-prev:hover {
            background-color: rgba(28, 24, 24, 0.782);
        }

        .slick-next:focus,
        .slick-prev:focus {
            background-color: rgba(28, 24, 24, 0.782);
        }

        .slick-prev:before,
        .slick-next:before {
            font-family: "slick";
            font-size: 40px;
            line-height: 1;

            opacity: 0.75;
            color: rgb(255, 255, 255);

            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

    </style>

@endsection

@section('content')
    @include('partials.nav')

    <section id="header">
        <div class="container-fluid">
            <div class="col-12">
                <div class="text-center content-part">
                    <div class="section-header">
                        <h1>كوفيد-١٩</h1>
                        <h3>إجمالي حالات كورونا المؤكدة</h3>
                        <h2 class="count-people">1132092</h2>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="section-wrapper">
                    <div class="banner-thumb">
                        <img src="img/covid-19-2.png" alt="lab-banner" style="max-width: 80%" />
                    </div>
                </div>
            </div>
        </div>

        <div id="summary" class="shadow">
            <div class="container">
                <h3 class="mb-3 text-center header">إجمالي الإحصائيات</h3>
                <div class="row">
                    <div class="m-auto col-12 col-md-6 col-lg-4">
                        <div class="summary-card">
                            <div class="img">
                                <img class="img-fluid" src="img/covid-green.png" alt="" />
                            </div>
                            <div class="text">
                                <h5 class="title">الحالات الاصابة</h5>
                                <h2 class="number">{{ $injury }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="m-auto col-12 col-md-6 col-lg-4">
                        <div class="summary-card">
                            <div class="img">
                                <img class="img-fluid" src="img/covid-blue.png" alt="" />
                            </div>
                            <div class="text">
                                <h5 class="title">الحالات الشفاء</h5>
                                <h2 class="number">{{ $recovery }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="m-auto col-12 col-md-6 col-lg-4">
                        <div class="summary-card">
                            <div class="img">
                                <img class="img-fluid" src="img/covid-red.png" alt="" />
                            </div>
                            <div class="text">
                                <h5 class="title">الوفيات</h5>
                                <h2 class="number">{{ $deaths }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="all-summary">
        <div class="container">
            <table id="example" style="text-align: center" class="table shadow table-striped table-bordered">
                <thead style="background-color: white">
                    <tr>
                        <th>المحافظة</th>
                        <th>الوفيات</th>
                        <th>الاصابات</th>
                        <th>الشفاء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($governorates as $item)
                        <tr>
                            <td class="the-contry">{{ $item->name }}</td>
                            <td class="count-number new_death">{{ $item->deaths }}</td>
                            <td class="count-number new_case">{{ $item->injury }}</td>
                            <td class="count-number new_recovered">{{ $item->recovery }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section id="test">
        <div class="container">
            <h1 class="text-center h1-header">أعراض فيروس كورونا</h1>
            <h4 class="mb-5 text-center">ما أعراض فيروس كورونا الجديد؟</h4>
            <div class="row">
                <div class="mb-5 col-4">
                    <div class="symptom-card">
                        <div class="mb-3 img">
                            <img class="img-fluid" src="img/coronavirus-symptoms/06.png" alt="" />
                        </div>
                        <h3>السعال</h3>
                    </div>
                </div>
                <div class="mb-5 col-4">
                    <div class="symptom-card">
                        <div class="mb-3 img">
                            <img class="img-fluid" src="img/coronavirus-symptoms/02.png" alt="" />
                        </div>
                        <h3>الحمى الساخنة</h3>
                    </div>
                </div>
                <div class="mb-5 col-4">
                    <div class="symptom-card">
                        <div class="mb-3 img">
                            <img class="img-fluid" src="img/coronavirus-symptoms/01.png" alt="" />
                        </div>
                        <h3>إلتهاب الحلق</h3>
                    </div>
                </div>
                <div class="mb-5 col-4">
                    <div class="symptom-card">
                        <div class="mb-3 img">
                            <img class="img-fluid" src="img/coronavirus-symptoms/03.png" alt="" />
                        </div>
                        <h3>الصداع</h3>
                    </div>
                </div>
                <div class="mb-5 col-4">
                    <div class="symptom-card">
                        <div class="mb-3 img">
                            <img class="img-fluid" src="img/coronavirus-symptoms/05.png" alt="" />
                        </div>
                        <h3>ضيق في التنفس</h3>
                    </div>
                </div>
                <div class="mb-5 col-4">
                    <div class="symptom-card">
                        <div class="mb-3 img">
                            <img class="img-fluid" src="img/coronavirus-symptoms/04.png" alt="" />
                        </div>
                        <h3>الارتباك</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <h1>Almost before we knew it, we had left the ground.</h1> -->

    <section id="slider" class="">
        <h1 class="text-center h1-header">كيف نحافظ على صحتنا</h1>
        <div class="regular slider">
            <div>
                <div class="card">
                    <div class="img">
                        <img src="img/home.png" alt="" />
                    </div>
                    <div class="card-body">
                        <h5 class="text-center">البقاء في المنزل</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <div class="img">
                        <img src="img/mask.png" alt="" />
                    </div>
                    <div class="card-body">
                        <h5 class="text-center"> ارتداء الكمامات </h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <div class="img">
                        <img src="img/cleaning-hands.png" alt="" />
                    </div>
                    <div class="card-body">
                        <h5 class="text-center"> غسل اليدين باستمرار</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <div class="img">
                        <img src="img/Cook-food.png" alt="" />
                    </div>
                    <div class="card-body">
                        <h5 class="text-center"> طبخ الطعام بشكل جيد</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <div class="img">
                        <img src="img/Doctor.png" alt="" />
                    </div>
                    <div class="card-body">
                        <h5 class="text-center"> البحث عن طبيب في حالة الشك</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <div class="img">
                        <img src="img/Crowding.png" alt="" />
                    </div>
                    <div class="card-body">
                        <h5 class="text-center"> تجنب الاماكن المزدحمة</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection


@section('js')
    <script src="{{ asset('style/js/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('style/js/slick.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var width = $(window).width();

        if (width >= 992) {
            $(".regular").slick({
                dots: false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                prevArrow: '<button type="button" data-role="none" class="slick-prev test">Previous</button>',
            });
        } else if (width >= 768 && width < 992) {
            $(".regular").slick({
                dots: false,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: '<button type="button" data-role="none" class="slick-prev test">Previous</button>',
            });
        } else if (width >= 500 && width < 768) {
            $(".regular").slick({
                dots: false,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                prevArrow: '<button type="button" data-role="none" class="slick-prev test">Previous</button>',
            });
        } else if (width < 500) {
            $(".regular").slick({
                dots: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '<button type="button" data-role="none" class="slick-prev test">Previous</button>',
            });
        }

        //$(window).on("resize", function () {
        //width = $(this).width();
        //$(location).prop("href", location.href);
        //});

    </script>
@endsection
