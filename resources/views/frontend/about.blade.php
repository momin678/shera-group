@extends('frontend.layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="row mt-md-3">
            <div class="col-md-3">
                <div class="left-content">
                    <!--widget about-menu-->
                    <div class="side-menu-section d-flex flex-column">
                        <a href="{{route('about')}}" class="menu-link active">Founder Chairman's Profile</a>
                        <a href="{{route('quality-assurance')}}" class="menu-link">quality assurance </a>
                        <a href="{{route('sister-concerns')}}" class="menu-link">Sister Concern</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="right-content">
                    <div class="common-title">
                        Founder Chairman's Profile
                    </div>
                    <div class="profile-image">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/about/founder_chairman.jpg')}}" alt="">
                    </div>
                    <div class="profile-text">
                        <p>
                            Samson H Chowdhury was born on 25 September, 1925. After completing education in India he
                            returned to the then East Pakistan and settled at Ataikula village in Pabna district where
                            his
                            father was working as a Medical Officer in an outdoor dispensary. In 1952, he started a
                            small
                            pharmacy in Ataikula village which is about 160 km off capital Dhaka in the north-west part
                            of
                            Bangladesh. Mr. Samson H Chowdhury then ventured into a partnership pharmaceutical company
                            with
                            three of his friends in 1958. When asked why the name SQUARE was chosen he remembers - "We
                            named
                            it SQUARE because it was started by four friends and also because it signifies accuracy and
                            perfection meaning quality" as they committed in manufacturing quality products. Now that
                            small
                            company of 1958 is a publicly listed diversified group of companies employing more than
                            28,000
                            people. The current yearly group turnover is 616 million USD.
                        </p>
                    </div>
                    <p>For more information visit : <a class="profile-link" href="#">www.samsonchowdhury.com</a></p>

                </div>
            </div>
        </div>
    </div>

</main>

@endsection