@extends('frontend.layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="row mt-md-3">
            <div class="col-md-3">
                <div class="left-content">
                    <!--widget about-menu-->
                    <div class="side-menu-section d-flex flex-column">
                        <a href="{{route('about')}}" class="menu-link ">Founder Chairman's Profile</a>
                        <a href="{{route('quality-assurance')}}" class="menu-link">quality assurance </a>
                        <a href="{{route('sister-concerns')}}" class="menu-link active">Sister Concern</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="right-content">
                    <div class="sister-concerns-section">
                        <div class="quality-content">
                            <div class="common-title">
                                Our Sister Concerns
                            </div>
                            <div class="sister-concerns-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/spl_logo.png ') }}" alt="">
                            </div>
                            <div class="profile-text">
                                <h3 class="sister-concerns-name">Square Pharmaceuticals Ltd.</h3>
                                <p>
                                    SQUARE Pharmaceuticals Limited is the largest pharmaceutical company in Bangladesh
                                    and it has been continuously in the 1st position among all national and
                                    multinational companies since 1985. It was established in 1958 and converted into a
                                    public limited company in 1991.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="sister-concerns-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/square-hospital.png ') }}" alt="">
                            </div>
                            <div class="profile-text">
                                <h3 class="sister-concerns-name">SQUARE Hospitals Ltd.</h3>
                                <p>
                                    SQUARE Pharmaceuticals Limited is the largest pharmaceutical company in Bangladesh
                                    and it has been continuously in the 1st position among all national and
                                    multinational companies since 1985. It was established in 1958 and converted into a
                                    public limited company in 1991.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="sister-concerns-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/maasranga-communication.png ') }}" alt="">
                            </div>
                            <div class="profile-text">
                                <h3 class="sister-concerns-name">Maasranga Communications Ltd.</h3>
                                <p>
                                    Maasranga is the only production house in Bangladesh from where 13 episodes of 08
                                    drama serials transmitted at a time in every week on 6 individual channels. It is
                                    equipped with world's latest high definition cameras, new HD editing setup, Apple
                                    Macintose G5 based edit panel with Final-cut Pro software, 02 HDV VTR etc. Country's
                                    only Sony HVR 1500A, HD-SDI cum DVCAM VCR with AJA KONA 3G capture card is available
                                    here to provide any sort of audio video input and output of web supporting
                                    resolution. Along with the production house we have introduced the first HD
                                    technology based latest television channel in Bangladesh named Maasranga Television.
                                    This channel is totally free from any sort of prejudice and fully based on the
                                    Benglai culture and rituals.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="sister-concerns-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/square-textile.png ') }}" alt="">
                            </div>
                            <div class="profile-text">
                                <h3 class="sister-concerns-name">Square Textiles Ltd.</h3>
                                <p>
                                    SQUARE Pharmaceuticals Limited is the largest pharmaceutical company in Bangladesh
                                    and it has been continuously in the 1st position among all national and
                                    multinational companies since 1985. It was established in 1958 and converted into a
                                    public limited company in 1991.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="sister-concerns-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/sabazpur-tea-company.png ') }}" alt="">
                            </div>
                            <div class="profile-text">
                                <h3 class="sister-concerns-name">Sabazpur Tea Company Ltd.</h3>
                                <p>
                                    SQUARE Pharmaceuticals Limited is the largest pharmaceutical company in Bangladesh
                                    and it has been continuously in the 1st position among all national and
                                    multinational companies since 1985. It was established in 1958 and converted into a
                                    public limited company in 1991.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="sister-concerns-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/square-toiletriesltd.png') }}" alt="">
                            </div>
                            <div class="profile-text">
                                <h3 class="sister-concerns-name">SQUARE Toiletries Ltd.</h3>
                                <p>
                                    SQUARE Pharmaceuticals Limited is the largest pharmaceutical company in Bangladesh
                                    and it has been continuously in the 1st position among all national and
                                    multinational companies since 1985. It was established in 1958 and converted into a
                                    public limited company in 1991.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="sister-concerns-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/mediacom.png ') }}" alt="">
                            </div>
                            <div class="profile-text">
                                <h3 class="sister-concerns-name">Mediacom Ltd.</h3>
                                <p>
                                    SQUARE Pharmaceuticals Limited is the largest pharmaceutical company in Bangladesh
                                    and it has been continuously in the 1st position among all national and
                                    multinational companies since 1985. It was established in 1958 and converted into a
                                    public limited company in 1991.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="sister-concerns-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/sal_logo.png ') }}" alt="">
                            </div>
                            <div class="profile-text">
                                <h3 class="sister-concerns-name">Square Air Ltd.</h3>
                                <p>
                                    SQUARE Pharmaceuticals Limited is the largest pharmaceutical company in Bangladesh
                                    and it has been continuously in the 1st position among all national and
                                    multinational companies since 1985. It was established in 1958 and converted into a
                                    public limited company in 1991.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="sister-concerns-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/SIL_logo.png ') }}" alt="">
                            </div>
                            <div class="profile-text">
                                <h3 class="sister-concerns-name">SQUARE InformatiX Ltd.</h3>
                                <p>
                                    SQUARE Pharmaceuticals Limited is the largest pharmaceutical company in Bangladesh
                                    and it has been continuously in the 1st position among all national and
                                    multinational companies since 1985. It was established in 1958 and converted into a
                                    public limited company in 1991.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


@endsection