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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            All Service Categories
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.add_service') }}" class="btn btn-primary pull-right">Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Image</th>
                                                <th>Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($serviceCategories as $index=>$serviceCategory)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $serviceCategory->name }}</td>
                                                <td>{{ $serviceCategory->slug }}</td>
                                                <td>
                                                    <image
                                                        src="{{ asset('images/categories/' . $serviceCategory->image) }}"
                                                        width="50" height="50"></image>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.service_by_category',['category_slug'=>$serviceCategory->slug]) }}">
                                                        <i class="fa fa-list fa-2x"></i>
                                                    </a>
                                                    <a href="{{ route('admin.edit_service',['category_id'=>$serviceCategory->id]) }}">
                                                        <i class="fa fa-edit fa-2x"></i>
                                                    </a>
                                                    <a href="#" onclick="confirm('Are you sure you want to delete this service?') || event.stopImmediatePropagation()"
                                                        wire:click.prevent="deleteServiceCategory({{ $serviceCategory->id }})"><i class="fa fa-trash fa-2x"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $serviceCategories->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
