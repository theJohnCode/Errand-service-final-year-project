<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>All Tasks Categories</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Task Categories</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="container">
            <div class="row" style="margin-top: -30px;">
                <div class="titles">
                    <h2>All <span>Tasks Categories</span></h2>
                    <i class="fa fa-plane"></i>
                    <hr class="tall">
                </div>
            </div>
        </div>
        <div class="content_info" style="margin-top: -70px;">
            <div class="row">
                <div class="col-md-12">
                    @if($serviceCategories->count() > 0)
                        <ul class="services-lines full-services">
                            @foreach($serviceCategories as $serviceCategory)
                                <li>
                                    <div class="item-service-line">
                                        <i class="fa">
                                            <a href="{{ route('home.service_by_category',['category_slug'=>$serviceCategory->slug]) }}">
                                                <img class="icon-img" src="{{ asset('images/categories/' . $serviceCategory->image) }}"
                                                     alt="{{ $serviceCategory->name }}"></a></i>
                                        <h5>{{ $serviceCategory->name }}</h5>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="col-md-12 text-center text-danger">There are no tasks available.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="content_info content_resalt">
            <div class="container">
                <div class="row">
                    <div class="titles">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
