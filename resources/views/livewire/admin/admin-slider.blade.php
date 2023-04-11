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
                <h1>All Sliders</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>All Sliders</li>
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
                                            All Sliders
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.add_slider') }}" class="btn btn-primary pull-right">Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Control</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($slides->count() > 0)
                                            @foreach($slides as $index=>$slide)
                                                <tr>
                                                    <td>{{ $index+1 }}</td>
                                                    <td>{{ $slide->title }}</td>
                                                    <td>
                                                        @if($slide->status)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <image
                                                            src="{{ asset('images/slides/' . $slide->image) }}"
                                                            width="50" height="50"></image>
                                                    </td>
                                                    <td>{{ $slide->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit_slider',['slider_id'=>$slide->id]) }}">
                                                            <i class="fa fa-edit fa-2x"></i>
                                                        </a>
                                                        <a href="#" onclick="confirm('Are you sure you want to delete this Slide?') ||
                                                            event.stopImmediatePropagation()" wire:click.prevent="deleteSlide({{ $slide->id }})"><i class="fa fa-trash fa-2x"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                                                <tbody>
                                                <tr>
                                                    <td colspan="6" class="text-center text-danger">There is no Sliders available.</td>
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
                    {{ $slides->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
