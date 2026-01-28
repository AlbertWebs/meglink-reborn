
 <header id="pq-header" class="pq-header-default pq-has-sticky ">
        @php
            $Settings = \App\Models\Setting::first();
        @endphp
        <div class="pq-top-header top-style-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="pq-top-right">
                            <div class="pq-header-time">
                                <ul>
                                    <li>
                                        <i class="ti-timer"></i>
                                        <span>Mon to Fri 9:00 am to 6:00pm</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="pq-header-social">
                                <ul>
                                    @if(!empty($Settings->facebook))
                                        <li><a href="{{ $Settings->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    @endif
                                    @if(!empty($Settings->instagram))
                                        <li><a href="{{ $Settings->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                    @if(!empty($Settings->linkedin))
                                        <li><a href="{{ $Settings->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    @endif
                                    @if(!empty($Settings->twitter))
                                        <li><a href="{{ $Settings->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if(!empty($Settings->tiktok))
                                        <li><a href="{{ $Settings->tiktok }}" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 text-right">
                        <div class="pq-header-contact text-right">
                            <ul>
                                @if(!empty($Settings->phone_number))
                                    <li>
                                        <a href="tel:{{ $Settings->phone_number }}">
                                            <i class="fas fa-phone"></i>
                                            <span>{{ $Settings->phone_number }}</span>
                                        </a>
                                    </li>
                                @endif
                                @if(!empty($Settings->phone_number_secondary))
                                    <li>
                                        <a href="tel:{{ $Settings->phone_number_secondary }}">
                                            <i class="fas fa-phone"></i>
                                            <span>{{ $Settings->phone_number_secondary }}</span>
                                        </a>
                                    </li>
                                @endif

                                @if(!empty($Settings->email))
                                    <li>
                                        <a href="mailto:{{ $Settings->email }}">
                                            <i class="fas fa-envelope"></i>
                                            <span>{{ $Settings->email }}</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pq-bottom-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{url('/')}}">
                                <img class="img-fluid logo site-logo" src="{{asset('uploads/logo.png')}}" alt="Meglink Ventures Limited">
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div id="pq-menu-contain" class="pq-menu-contain">
                                    {{--  --}}
                                    <ul id="pq-main-menu" class="navbar-nav ml-auto">
                                        <li class="menu-item @if($page == 'home')  current-menu-item @endif">
                                            <a href="{{route('home')}}" aria-current="page">Home</a>
                                        </li>
                                        {{-- <li class="menu-item ">
                                            <a href="{{route('about')}}" aria-current="page">About Us</a>
                                        </li> --}}

                                        <li class="menu-item @if($page == 'about'  || $page == 'history' || $page == 'pm-consultants' || $page == 'realtors') current-menu-item @endif menu-item-has-children">
                                            <a href="{{route('about')}}" aria-current="page">About Us</a><i
                                                class="fa fa-chevron-down pq-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="{{route('about')}}/#team" aria-current="page">Meet Our Team</a>
                                                </li>
                                                <li class="menu-item @if($page == 'history') current-menu-item @endif">
                                                    <a href="{{route('history')}}">Our History</a>
                                                </li>
                                                <li class="menu-item @if($page == 'pm-consultants') current-menu-item @endif">
                                                    <a href="{{route('project-management-consultants')}}">Project Management Consultants</a>
                                                </li>
                                                <li class="menu-item @if($page == 'realtors') current-menu-item @endif">
                                                    <a href="{{route('realtors')}}">Realtors</a>
                                                </li>
                                            </ul>
                                        </li>


                                        <li class="menu-item @if($page == 'services') current-menu-item @endif menu-item-has-children">
                                            <a href="{{route('services')}}" aria-current="page">What We Do</a><i
                                                class="fa fa-chevron-down pq-submenu-icon"></i>
                                            <?php $Service = \App\Models\Service::all(); ?>
                                            <ul class="sub-menu">
                                                @foreach ($Service as $service)
                                                <li class="menu-item">
                                                    <a href="{{route('services')}}/{{$service->slung}}" aria-current="page">{{$service->title}}</a>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </li>



                                        <li class="menu-item @if($page == 'portfolio') current-menu-item @endif menu-item-has-children">
                                            <a href="{{route('our-work')}}">Our Work</a><i
                                                class="fa fa-chevron-down pq-submenu-icon"></i>
                                                <ul class="sub-menu">
                                                        @foreach ($Service as $service)
                                                        <li class="menu-item">
                                                            <a href="{{ route('portfolio-service', $service->slung) }}" aria-current="page">{{$service->title}}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>

                                        </li>

                                           <li class="menu-item @if($page == 'Renders') current-menu-item @endif">
                                            <a href="{{route('renders')}}">Design Renders</a>
                                        </li>

                                        {{-- <li class="menu-item @if($page == 'portfolio'  || $page == 'portfolio') current-menu-item @endif menu-item-has-children">
                                            <a href="{{route('our-work')}}" aria-current="page">Our Work</a><i
                                                class="fa fa-chevron-down pq-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="{{route('our-work')}}" aria-current="page">Interiors</a>
                                                </li>
                                                <li class="menu-item @if($page == 'history') current-menu-item @endif">
                                                    <a href="{{route('renders')}}">Renders</a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                        <li class="menu-item @if($page == 'land') current-menu-item @endif">
                                            <a href="{{route('land-for-sale')}}" aria-current="page">Land For Sale</a>
                                        </li>
                                        {{-- <li class="menu-item @if($page == 'updates') current-menu-item @endif">
                                            <a href="{{route('trendy-updates')}}" aria-current="page">Trendy Updates</a>
                                        </li> --}}

                                        <li class="menu-item @if($page == 'contact') current-menu-item @endif">
                                            <a href="{{route('contact')}}">Contact Us</a>
                                        </li>
                                    </ul>
                                    {{--  --}}
                                </div>
                            </div>
                            <div class="pq-btn-container">
                                <a href="{{route('contact')}}" class="pq-button pq-button-flat">
                                    <div class="pq-button-block">
                                        <span class="pq-button-text">Get Quote</span>
                                        <span class="pq-button-line-right"></span>
                                        <i class="ion ion-ios-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

