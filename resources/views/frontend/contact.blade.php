@extends('frontend.layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="row mt-md-3">
            <div class="col-md-12">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 common-hide item-one">
                            <div class="contact-info shadow">
                                <div class="bg-gray">
                                    <div class="img shadow">
                                        <img class="" src="{{asset('assets/frontend/images/about/avator.webp')}}" alt="">
                                    </div>
                                    <ul>
                                        <li>Kamrul Kuddusy</li>
                                        <li class="name">HR</li>
                                        <li>Sheragroup</li>
                                        <li>Saleh Sadan (4th Floor)<br> 145 Motijheel C/A, Dhaka - 1000</li>
                                        <li>WhatsApp: 01711-442275</li>
                                        <li>E-mail: <a href="info@sheragroup.net">info@sheragroup.net</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 common-hide item-two">
                            <div class="contact-info shadow">
                                <div class="bg-gray">
                                    <div class="img shadow">
                                        <img class="" src="{{asset('assets/frontend/images/about/avator.webp')}}" alt="">
                                    </div>
                                    <ul>
                                        <li>MD. Himon</li>
                                        <li class="name">Marketing & Sales</li>
                                        <li>Sheragroup</li>
                                        <li>Saleh Sadan (4th Floor)<br> 145 Motijheel C/A, Dhaka - 1000</li>
                                        <li>WhatsApp: 01711-442275</li>
                                        <li>E-mail: <a href="info@sheragroup.net">info@sheragroup.net</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 common-hide item-three">
                            <div class="contact-info shadow">
                                <div class="bg-gray">
                                    <div class="img shadow">
                                        <img class="" src="{{asset('assets/frontend/images/about/avator.webp')}}" alt="">
                                    </div>
                                    <ul>
                                        <li>Golam Morshed</li>
                                        <li class="name">Import & Supply Chain</li>
                                        <li>Sheragroup</li>
                                        <li>Saleh Sadan (4th Floor)<br> 145 Motijheel C/A, Dhaka - 1000</li>
                                        <li>WhatsApp: 01711-442275</li>
                                        <li>E-mail: <a href="info@sheragroup.net">info@sheragroup.net</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form method="post" action="{{route('contact-submit')}}" class="contact-form shadow bg-white">
                                @csrf
                                <div class="form-group">
                                  <label for="inputName">Name</label>
                                  <input type="text" id="inputName" name="name" class="form-control" />
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail">E-Mail</label>
                                  <input type="email" id="inputEmail" name="email" class="form-control" />
                                </div>
                                <div class="form-group">
                                  <label for="phonename">Phone Number</label>
                                  <input type="text" id="phonename" name="phone_number" class="form-control" />
                                </div>
                                <div class="form-group">
                                  <label for="inputSubject">Subject</label>
                                  <input type="text" id="inputSubject" name="subject" class="form-control" />
                                </div>
                                <div class="form-group">
                                  <label for="inputMessage">Message</label>
                                  <textarea id="inputMessage" class="form-control" name="message" rows="4"></textarea>
                                </div>
                                <div class="form-group mt-2">
                                  <input type="submit" class="btn btn-primary" value="Send message">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection