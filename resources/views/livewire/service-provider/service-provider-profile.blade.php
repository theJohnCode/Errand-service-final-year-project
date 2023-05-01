<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Profile</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-8 col-md-offset-2 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Profile
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if($serviceProvider->image)
                                                <img src="{{ asset('images/service_providers') . '/' . $serviceProvider->image  }}" width="100%" height="100%">
                                            @else
                                                <img src="{{ asset('images/service_providers/default.png') }}" width="100%" height="100%">
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Name : {{ Auth::user()->name }}</h3>
                                            <h6>Email : {{ Auth::user()->email }}</h6>
                                            <h6>Phone : {{ Auth::user()->phone }}</h6>
                                            <h6>City : {{ $serviceProvider->city }}</h6>
                                            <h6>Service Category : {{ optional($serviceProvider->category)->name }}</h6>
                                            <h6>Service Location : {{ $serviceProvider->service_locations }}</h6>
                                            <a href="{{ route('service-provider.edit_profile') }}" class="btn btn-primary pull-right">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

