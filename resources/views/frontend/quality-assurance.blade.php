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
                        <a href="{{route('quality-assurance')}}" class="menu-link active">quality assurance </a>
                        <a href="{{route('sister-concerns')}}" class="menu-link">Sister Concern</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="right-content">
                    <div class="quality-assurance-section">
                        <div class="quality-content">
                            <div class="common-title">
                                Quality Assurance
                            </div>
                            <div class="profile-text">
                                <p>
                                    As a market leader and a member of the prestigious Square Group, Square Food & Beverage
                                    Limited always delivers quality products for its customers. The company cares for its
                                    consumers and keeps its promise by accumulating the finest ingredients. It maintains
                                    consistent quality of the products and keeps updating the latest technology.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="common-title">
                                Finest Ingredients
                            </div>
                            <div class="profile-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/finest_ingredients.png ')}}" alt="">
                            </div>
                            <div class="profile-text">
                                <p>
                                    When it comes to cooking, ingredients are the first priority. Tasty and healthy food can
                                    never be made from inferior ingredients. Using quality products like spices and edible oil
                                    easily makes good cooking much easier. Square Food & Beverage Limited takes special care in
                                    selecting the raw materials. The company strictly maintains superiority in procuring raw
                                    materials by collecting them from those locations where the best quality raw materials are
                                    harvested. Thus it contributes to the purity and authenticity of final products.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="common-title">
                                Technology
                            </div>
                            <div class="profile-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/technology.png ')}}" alt="">
                            </div>
                            <div class="profile-text">
                                <p>
                                    Spices have a long and ancient history, especially in our subcontinent, where they are a
                                    part of life and heritage. But with change of time the spices processing technology has also
                                    been changed. Square Consumer Products Ltd. provides consumers those spices which are made
                                    from the choicest raw materials maintaining the highest processing standards. The company
                                    uses the state of the art technology for production process. The low temperature Grinding
                                    technology guarantees all essential volatile oil intact along with appropriate
                                    pulverization. The manufacturing plant of the company has a hi-tech laboratory where the
                                    quality check is accomplished. The company uses fully automated packaging system which
                                    ensures zero exposure to external hazard.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="common-title">
                                Manufacturing Unit
                            </div>
                            <div class="profile-image">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/about/m_unit.png ')}}" alt="">
                            </div>
                            <div class="profile-text">
                                <p>
                                    The manufacturing unit of Square Food & Beverage Limited is located at Pabna, the northern
                                    part of Bangladesh, which is prominent for agricultural products and thus it is convenient
                                    to source specific variety of raw materials. This gives the company the opportunity to
                                    produce food items from the best quality raw materials. Square Food & Beverage Limited's
                                    manufacturing units are environment friendly and are equipped with modern machineries.
                                    Technical capabilities in processing, post-harvest handling, maintaining Good Manufacturing
                                    Practice (GMP) and modern grinding technology have given Square Food & Beverage Limited
                                    strong competitive edge in the industry.
                                </p>
                            </div>
                        </div>
                        <div class="quality-content">
                            <div class="common-title">
                                Quality Certification
                            </div>
                            <div class="profile-text">
                                <p>
                                    Due to the excellent quality management system Square Food & Beverage Limited obtained ISO
                                    9001 in 2005. Moreover, the company has obtained ISO 22000 for its food safety management
                                    system. Strong commitment to quality, adoption of advanced technology, stress on human
                                    resource development, focus on continuous improvement and introduction of new products for
                                    the growing markets has given the company a decisive position in the industry.
                                </p>
                            </div>
                        </div>
                        <div class="concern-company">
                            Square Food & Beverage Limited strives to manufacture and pack all the products following
                            the requirements of CODEX, HACCP and FDA in order to meet the requirement of the customers
                            of home and abroad. The special areas of concern of the company are:

                            <ul>
                                <li>Focus on customer</li>
                                <li>Leadership ability of the human resources</li>
                                <li>Involvement of people</li>
                                <li>Process approach</li>
                                <li>System approach to management</li>
                                <li>Continual improvement</li>
                                <li>Factual approach to decision making</li>
                                <li>Mutually beneficial supplier relationships</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


@endsection