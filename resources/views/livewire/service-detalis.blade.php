<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>{{ $service->name }}</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>{{ $service->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="semiboxshadow text-center">
            <img src="{{ asset('images/services/thumbnails/' . $service->thumbnail) }}" class="img-responsive"
                alt="{{ $service->name }}">
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
                                                        rel="bookmark">{{ $service->name }}:
                                                        {{ $service->category->name }}
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
                                                <img src="{{ asset('images/services/services/' . $service->image) }}"
                                                    alt="{{ $service->name }}" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="post-content">
                                            <h3>{{ $service->name }}</h3>
                                            <p>{{ $service->description }}</p>
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
                                                    {{-- {{ $service->price }} --}}
                                                    Negotiable
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <td>Quantity</td>
                                                <td>1</td>
                                            </tr> --}}
                                            {{-- <tr>
                                                <td>Discount</td>
                                                @php
                                                    $total = $service->price;
                                                @endphp
                                                @if ($service->discount)
                                                    @if ($service->discount_type === 'fixed')
                                                        <td>₦ {{ $service->discount }}</td>
                                                        @php $total = $total - $service->discount; @endphp
                                                    @elseif($service->discount_type === 'percent')
                                                        <td>{{ $service->discount }} %</td>
                                                        @php $total = $total - ($total * $service->discount / 100); @endphp
                                                    @endif
                                                @else
                                                    <td>No Discount</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td><span>&#8358;</span> {{ $total }}</td>
                                            </tr> --}}
                                        </table>
                                    </div>
                                    <div class="panel-footer">
                                        @if (auth()->id() !== $service->postedBy->id && auth()->user()->utype == 'ERR')
                                            <a href="{{ route('user', ['id' => $service->postedBy->id, 'task_id' => $service->id]) }}"
                                                class="btn btn-primary">Book Now
                                            </a>
                                        @else
                                            <a href="{{ route('home.service_details', ['service_slug' => $service->slug]) }}"
                                                class="btn btn-primary">View
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </aside>
                            <aside>
                                <h3>Related Service</h3>
                                @if ($related_service)
                                    <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini"
                                        style="max-width: 360px">
                                        <a
                                            href="{{ route('home.service_details', ['service_slug' => $related_service->slug]) }}">
                                            <div class="img-hover">
                                                <img src="{{ asset('images/services/thumbnails/' . $related_service->thumbnail) }}"
                                                    alt="{{ $related_service->name }}" class="img-responsive">
                                            </div>
                                            <div class="info-gallery">
                                                <h3>
                                                    {{ $related_service->name }}
                                                </h3>
                                                <hr class="separator">
                                                <p>{{ $related_service->name }}</p>
                                                <div class="content-btn">
                                                    <a href="{{ route('home.service_details', ['service_slug' => $service->slug]) }}"
                                                        class="btn btn-warning">View Details</a>
                                                </div>
                                                <div class="price">
                                                    <span>&#8358;</span>Negotiable
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
