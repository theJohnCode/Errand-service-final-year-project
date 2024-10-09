<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>{{ $availability->service->name }}</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>{{ $availability->service->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="semiboxshadow text-center">
            <img src="{{ asset('images/services/thumbnails/' . $availability->service->thumbnail) }}" class="img-responsive"
                alt="{{ $availability->service->name }}">
        </div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 single-blog">
                            <div class="post-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="post-header">
                                            <div class="post-format-icon post-format-standard"
                                                style="margin-top: -10px;">
                                                <i class="fa fa-image"></i>
                                            </div>
                                            <div class="post-info-wrap">
                                                <h2 class="post-title">
                                                    <a href="#" title="Post Format: Standard"
                                                        rel="bookmark">{{ $availability->service->name }}:
                                                        {{ $availability->service->category->name }}
                                                    </a>
                                                </h2>
                                                <div class="post-meta" style="height: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="single-carousel">
                                            <div class="img-hover">
                                                <img src="{{ asset('images/services/services/' . $availability->service->image) }}"
                                                    alt="{{ $availability->service->name }}" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="post-content">
                                            <h3>{{ $availability->runner->name }}</h3>
                                            <p>{{ $availability->runner->phone }}</p>
                                            <p>{{ $availability->runner->address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <aside class="widget" style="margin-top: 18px;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Booking Details</div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td style="border-top: none;">Price</td>
                                                <td style="border-top: none;"><span>&#8358;</span>
                                                    {{ $availability->price }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Quantity</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>Discount</td>
                                                @php
                                                    $total = $availability->price;
                                                @endphp
                                                @if ($availability->discount)
                                                    @if ($availability->discount_type === 'fixed')
                                                        <td>₦ {{ $availability->discount }}</td>
                                                        @php $total = $total - $availability->discount; @endphp
                                                    @elseif($availability->discount_type === 'percent')
                                                        <td>{{ $availability->discount }} %</td>
                                                        @php $total = $total - ($total * $availability->discount / 100); @endphp
                                                    @endif
                                                @else
                                                    <td>No Discount</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td><span>&#8358;</span> {{ $total }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-footer">
                                        @if (auth()->id() !== $availability->runner->id && auth()->user()->utype == 'ERC')
                                            <a href="{{ URL('errandify', $availability->runner) }}"
                                                class="btn btn-primary">Book Now
                                            </a>
                                        @else
                                            <a href="{{ route('home') }}"
                                                class="btn btn-primary">Home
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </aside>
                            <aside>
                                <h3>Related Service</h3>
                                @if ($related_availability)
                                    <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini"
                                        style="max-width: 360px">
                                        <a
                                            href="{{ route('home.service_details', ['service_slug' => $related_availability->slug]) }}">
                                            <div class="img-hover">
                                                <img src="{{ asset('images/services/thumbnails/' . $related_availability->thumbnail) }}"
                                                    alt="{{ $related_availability->name }}" class="img-responsive">
                                            </div>
                                            <div class="info-gallery">
                                                <h3>
                                                    {{ $related_availability->name }}
                                                </h3>
                                                <hr class="separator">
                                                <p>{{ $related_availability->name }}</p>
                                                <div class="content-btn">
                                                    <a href="{{ route('home.service_details', ['service_slug' => $availability->slug]) }}"
                                                        class="btn btn-warning">View Details</a>
                                                </div>
                                                <div class="price">
                                                    <span>&#8358;</span><b>From</b>{{ $related_availability->price }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini"
                                        style="max-width: 360px">
                                        <p>No Related Services</p>
                                    </div>
                                @endif
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
