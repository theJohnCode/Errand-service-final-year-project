<div>
    <section class="tp-banner-container">

        <div class="tp-banner">
            @if ($slides->count() > 0)
                <ul>
                    @foreach ($slides as $slide)
                        <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                            data-saveperformance="off" data-title="Slide">
                            <img src="{{ asset('images/slides/' . $slide->image) }}" alt="{{ $slide->name }}"
                                data-bgposition="center center" data-kenburns="on" data-duration="6000"
                                data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100"
                                data-bgpositionend="right center">
                        </li>
                    @endforeach
                </ul>
            @else
                <ul>
                    <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                        data-saveperformance="off" data-title="Slide">
                        <img src="{{ asset('assets/img/slide/1.jpg') }}" alt="fullslide1"
                            data-bgposition="center center" data-kenburns="on" data-duration="6000"
                            data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100"
                            data-bgpositionend="right center">
                    </li>
                    <li data-transition="slidehorizontal" data-slotamount="1" data-masterspeed="1000"
                        data-saveperformance="off" data-title="Slide">
                        <img src="{{ asset('assets/img/slide/2.jpg') }}" alt="fullslide1" data-bgposition="top center"
                            data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                            data-bgfitend="100" data-bgpositionend="right center">
                    </li>
                </ul>
            @endif
            <div class="tp-bannertimer"></div>
        </div>

        <div class="filter-title">
            <div class="title-header">
                <h2 style="color:#fff;">BOOK A SERVICE</h2>
                <p class="lead">Book a service at very affordable price, </p>
            </div>
            <div class="filter-header">
                <form id="sform" action="{{ route('home.search_service') }}" method="POST">
                    @csrf
                    <input type="text" id="search" name="search" required="required"
                        placeholder="What Services do you want?" class="input-large typeahead" autocomplete="off">
                    <input type="submit" name="submit" value="Search">
                </form>
            </div>
        </div>

    </section>
    <section class="content-central">

        <div class="content_info content_resalt">
            <div class="container" style="margin-top: 40px;">
                <div class="row">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if ($service_categories->count() > 0)
                            <ul id="sponsors" class="tooltip-hover">
                                @foreach ($service_categories as $service_category)
                                    <li data-toggle="tooltip" title="{{ $service_category->name }}"
                                        data-original-title="{{ $service_category->name }}"> <a
                                            href="{{ route('home.service_by_category', ['category_slug' => $service_category->slug]) }}">
                                            <img src="{{ asset('images/categories/' . $service_category->image) }}"
                                                alt="{{ $service_category->name }}">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <ul id="sponsors" class="tooltip-hover">
                                <li>
                                    <p class="text-center text-danger">No Services Categories Available Now</p>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="semiboxshadow text-center">
            <img src="{{ asset('assets/img/img-theme/shp.png') }}" class="img-responsive" alt="">
        </div>

        <div class="content_info">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="titles">
                            <h2>Our <span>Choice</span> of Services</h2>
                            <i class="fa fa-plane"></i>
                            <hr class="tall">
                        </div>
                    </div>
                    <div class="portfolioContainer" style="margin-top: -50px;">
                        @if ($featured_services->count() > 0)
                            @foreach ($featured_services as $featured_service)
                                <div class="col-xs-6 col-sm-4 col-md-3 hsgrids"
                                    style="padding-right: 5px;padding-left: 5px;">
                                    <a class="g-list"
                                        href="{{ route('home.service_details', ['service_slug' => $featured_service->slug]) }}">
                                        <div class="img-hover">
                                            <img src="{{ asset('images/services/thumbnails/' . $featured_service->thumbnail) }}"
                                                alt="{{ $featured_service->name }}" class="img-responsive">
                                        </div>
                                        <div class="info-gallery">
                                            <h3>{{ $featured_service->name }}</h3>
                                            <hr class="separator">
                                            <p>{{ $featured_service->tagline }}</p>
                                            <div class="content-btn"><a
                                                    href="{{ route('home.service_details', ['service_slug' => $featured_service->slug]) }}"
                                                    class="btn btn-primary">Book Now</a></div>
                                            <div class="price">
                                                <span>&#36;</span><b>From</b>{{ $featured_service->price }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p class="col-md-12 text-center text-danger">There are no choice services available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="content_info">
            <div class="bg-dark color-white border-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="services-lines-info">
                                <h2>WELCOME TO DIVERSIFIED</h2>
                                <p class="lead">
                                    Book best services at one place.
                                    <span class="line"></span>
                                </p>

                                <p>Find a wide variety of home services.</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            @if ($featured_categories->count() > 0)
                                <ul class="services-lines">
                                    @foreach ($featured_categories as $featured_category)
                                        <li>
                                            <a
                                                href="{{ route('home.service_by_category', ['category_slug' => $featured_category->slug]) }}">
                                                <div class="item-service-line">
                                                    <i class="fa">
                                                        <img class="icon-img"
                                                            src="{{ asset('images/categories/' . $featured_category->image) }}"></i>
                                                    <h5>{{ $featured_category->name }}</h5>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <ul id="sponsors" class="tooltip-hover">
                                    <li>
                                        <p class="text-center text-danger">No Services Categories Available Now</p>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="titles">
                        <h2><span>Appliance</span>Services</h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div id="boxes-carousel">
                @if ($appliance_services->count() > 0)
                    @foreach ($appliance_services as $appliance_service)
                        <div>
                            <a class="g-list"
                                href="{{ route('home.service_details', ['service_slug' => $appliance_service->slug]) }}">
                                <div class="img-hover">
                                    <img src="{{ asset('images/services/thumbnails/' . $appliance_service->thumbnail) }}"
                                        alt="{{ $appliance_service->name }}" class="img-responsive">
                                </div>
                                <div class="info-gallery">
                                    <h3>{{ $appliance_service->name }}</h3>
                                    <hr class="separator">
                                    <p>{{ $appliance_service->tagline }}</p>
                                    <div class="content-btn">
                                        <a href="{{ route('home.service_details', ['service_slug' => $appliance_service->slug]) }}"
                                            class="btn btn-primary">Book Now</a>
                                    </div>
                                    <div class="price"><span>&#36;</span><b>From</b>{{ $appliance_service->price }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <ul id="sponsors" class="tooltip-hover">
                        <li>
                            <p class="text-center text-danger">No Services Categories Available Now</p>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </section>
</div>

@push('js')
    <script>
        var path = "{{ route('home.autocomplete') }}";
        $('input.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    search: query
                }, function(data) {
                    return process(data)
                });
            }
        });
    </script>
@endpush
