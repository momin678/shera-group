<header class="header-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex header-top justify-content-between py-3 py-md-4">
                    <div class="logo">
                        <a href="#"><img class="img-fluid" src="{{asset('assets/frontend/images/en-logo.png') }}" alt=""></a>
                    </div>
                    <div class="logo">
                         <a href=""><img class="img-fluid" src="{{asset('assets/frontend/images/bn-logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="menu-section">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="main_nav">
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item {{request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="{{url('/')}}">Home </a></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#">
                                            Our Brands
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach (\App\Models\Category::where('level', 0)->get() as $category)
                                                <li><a class="dropdown-item" href="{{route('sub-category-list',$category->id)}}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item {{request()->is('global-presence') ? 'active' : '' }}"><a class="nav-link" href="{{route('global-presence')}}"> Global Presence </a></li>
                                    <li class="nav-item {{request()->is('national-presence') ? 'active' : '' }}"><a class="nav-link" href="{{route('national-presence')}}"> National Presence </a></li>
                                </ul>
                                <ul class="navbar-nav">
                                    <li class="nav-item ms-auto {{request()->is('about') ? 'active' : '' }}"><a class="nav-link" href="{{route('about')}}"> About </a></li>
                                    <li class="nav-item ms-auto {{request()->is('contact') ? 'active' : '' }}"><a class="nav-link" href="{{route('contact')}}"> contact Us </a></li>
                                </ul>
                            </div> <!-- navbar-collapse.// -->
                        </div> <!-- container-fluid.// -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>