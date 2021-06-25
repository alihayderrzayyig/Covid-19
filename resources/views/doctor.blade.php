@extends('layouts.app')

@php $active_sidebar = 'doctor'; @endphp

@section('css')

@endsection

@section('content')
    @include('partials.nav')


    <section id="talk-doctor-header">
        <div class="p-0 m-0 container-fluid">
            <div class="img">
                <img src="{{ asset('img/talk-doctor-header.png') }}" alt="" srcset="" />
            </div>
            <div class="text-center text">
                <h1 class="text-center h1-header">تحدث مع طبيبك الان</h1>
                <p>استشارة طبية موثوقة بايدي افضل الاطباء</p>
                <!-- <p>خصوصة تامةواجابة شافية</p> -->
            </div>
        </div>
    </section>

    <!-- Doctor -->
    <section id="search-doctor" class="overflow-hidden">
        <div class="container">
            <div class="flex-row-reverse row">
                @foreach ($doctors as $item)
                    <div class="mb-5 col-sm-12 col-md-6 col-xl-4">
                        <div class="shadow card">
                            <div class="mb-3 card-img">
                                <img src="{{ asset($item->image) }}" class="shadow" alt="" />
                            </div>
                            <div class="card-title">
                                <h3>{{ $item->name }}</h3>
                            </div>
                            <div class="card-specialties">
                                <h6 class="text-capitalize">اختصاص</h6>
                                <p>{{ $item->specialty }}</p>
                            </div>
                            <div class="card-footer">
                                <div class="card-doctor-icons">
                                    <div>
                                        <a href="#"><i class="fas fa-phone-alt fa-3x"></i></a>
                                        <p class="text-uppercase">{{ $item->phone }}</p>
                                    </div>
                                    <div>
                                        <a href="#"><i class="fas fa-map-marker-alt fa-3x"></i></a>
                                        <p class="text-uppercase">{{ $item->location }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="mb-5 col-sm-12 col-md-6 col-xl-4">
                    <div class="shadow card">
                        <div class="mb-3 card-img">
                            <img src="img/doc-6.jpg" class="shadow" alt="" />
                        </div>
                        <div class="card-title">
                            <h3>د. علي حيدر رزيك</h3>
                        </div>
                        <div class="card-specialties">
                            <h6 class="text-capitalize">اختصاص</h6>
                            <p>جراحة عامة، طوارء.</p>
                        </div>
                        <div class="card-footer">
                            <div class="card-doctor-icons">
                                <div>
                                    <a href="#"><i class="fas fa-phone-alt fa-3x"></i></a>
                                    <p class="text-uppercase">07829386530</p>
                                </div>
                                <div>
                                    <a href="#"><i class="fas fa-map-marker-alt fa-3x"></i></a>
                                    <p class="text-uppercase">الرمادي شارع الاطباء</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 col-sm-12 col-md-6 col-xl-4">
                    <div class="shadow card">
                        <div class="mb-3 card-img">
                            <img src="img/doc-6.jpg" class="shadow" alt="" />
                        </div>
                        <div class="card-title">
                            <h3>د. علي حيدر رزيك</h3>
                        </div>
                        <div class="card-specialties">
                            <h6 class="text-capitalize">اختصاص</h6>
                            <p>جراحة عامة، طوارء.</p>
                        </div>
                        <div class="card-footer">
                            <div class="card-doctor-icons">
                                <div>
                                    <a href="#"><i class="fas fa-phone-alt fa-3x"></i></a>
                                    <p class="text-uppercase">07829386530</p>
                                </div>
                                <div>
                                    <a href="#"><i class="fas fa-map-marker-alt fa-3x"></i></a>
                                    <p class="text-uppercase">الرمادي شارع الاطباء</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 col-sm-12 col-md-6 col-xl-4">
                    <div class="shadow card">
                        <div class="mb-3 card-img">
                            <img src="img/doc-6.jpg" class="shadow" alt="" />
                        </div>
                        <div class="card-title">
                            <h3>د. علي حيدر رزيك</h3>
                        </div>
                        <div class="card-specialties">
                            <h6 class="text-capitalize">اختصاص</h6>
                            <p>جراحة عامة، طوارء.</p>
                        </div>
                        <div class="card-footer">
                            <div class="card-doctor-icons">
                                <div>
                                    <a href="#"><i class="fas fa-phone-alt fa-3x"></i></a>
                                    <p class="text-uppercase">07829386530</p>
                                </div>
                                <div>
                                    <a href="#"><i class="fas fa-map-marker-alt fa-3x"></i></a>
                                    <p class="text-uppercase">الرمادي شارع الاطباء</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 col-sm-12 col-md-6 col-xl-4">
                    <div class="shadow card">
                        <div class="mb-3 card-img">
                            <img src="img/doc-6.jpg" class="shadow" alt="" />
                        </div>
                        <div class="card-title">
                            <h3>د. علي حيدر رزيك</h3>
                        </div>
                        <div class="card-specialties">
                            <h6 class="text-capitalize">اختصاص</h6>
                            <p>جراحة عامة، طوارء.</p>
                        </div>
                        <div class="card-footer">
                            <div class="card-doctor-icons">
                                <div>
                                    <a href="#"><i class="fas fa-phone-alt fa-3x"></i></a>
                                    <p class="text-uppercase">07829386530</p>
                                </div>
                                <div>
                                    <a href="#"><i class="fas fa-map-marker-alt fa-3x"></i></a>
                                    <p class="text-uppercase">الرمادي شارع الاطباء</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 col-sm-12 col-md-6 col-xl-4">
                    <div class="shadow card">
                        <div class="mb-3 card-img">
                            <img src="img/doc-6.jpg" class="shadow" alt="" />
                        </div>
                        <div class="card-title">
                            <h3>د. علي حيدر رزيك</h3>
                        </div>
                        <div class="card-specialties">
                            <h6 class="text-capitalize">اختصاص</h6>
                            <p>جراحة عامة، طوارء.</p>
                        </div>
                        <div class="card-footer">
                            <div class="card-doctor-icons">
                                <div>
                                    <a href="#"><i class="fas fa-phone-alt fa-3x"></i></a>
                                    <p class="text-uppercase">07829386530</p>
                                </div>
                                <div>
                                    <a href="#"><i class="fas fa-map-marker-alt fa-3x"></i></a>
                                    <p class="text-uppercase">الرمادي شارع الاطباء</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection


@section('js')
@endsection
