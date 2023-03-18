<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Service Categories</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Service Categories</li>
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
                        <div class="col-md-12 profile1">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($serviceCategories as $index=>$serviceCategory)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $serviceCategory->name }}</td>
                                            <td>{{ $serviceCategory->slug }}</td>
                                            <td><image src="{{ asset('images/categories/' . $serviceCategory->image) }}" width="50" height="50"></image></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $serviceCategories->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
