<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav div.flex {
            display: none !important;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>All Services</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>All Services</li>
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            All Services
                                        </div>
                                        <div class="col-md-6">
                                            <a href="#" class="btn btn-primary pull-right">Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Control</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($services->count() > 0)
                                            @foreach($services as $index=>$service)
                                                <tr>
                                                    <td>{{ $index+1 }}</td>
                                                    <td>{{ $service->name }}</td>
                                                    <td>{{ $service->price }}</td>
                                                    <td>
                                                        @if($service->status)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    <td>{{ $service->category->name }}</td>
                                                    <td>
                                                        <image
                                                            src="{{ asset('images/services/thumbnails/' . $service->thumbnail) }}"
                                                            width="50" height="50"></image>
                                                    </td>
                                                    <td>{{ $service->created_at }}</td>
                                                    <td>
                                                        <a href="">
                                                            <i class="fa fa-edit fa-2x"></i>
                                                        </a>
                                                        <a href="#"><i class="fa fa-trash fa-2x"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                                                <tbody>
                                                <tr>
                                                    <td colspan="8" class="text-center text-danger">There is no Services available.</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
