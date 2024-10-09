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
                <h1>All Availabilities</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>All Availabilities</li>
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
                                            All Availablilities
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('customer.add.availability') }}"
                                                class="btn btn-primary pull-right">Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Service</th>
                                                <th>Available From</th>
                                                <th>Available Until</th>
                                                <th>Status</th>
                                                <th>Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($availabilities->count() > 0)
                                                @foreach ($availabilities as $available)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $available->service->name }}</td>
                                                        <td>{{ Carbon\Carbon::parse($available->available_from)->format('jS F Y') }}</td>
                                                        <td>{{ Carbon\Carbon::parse($available->available_until)->format('jS F Y') }}</td>
                                                        <td>
                                                            @if ($available->status)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif
                                                        </td>
                                            
                                                        <td>
                                                            <a
                                                                href="{{ route('customer.edit.availability', ['availability_id' => $available->id]) }}">
                                                                <i class="fa fa-edit fa-2x"></i>
                                                            </a>
                                                            <a href="#"
                                                                onclick="confirm('Are you sure you want to delete this service?') ||
                                                            event.stopImmediatePropagation()"
                                                                wire:click.prevent="deleteAvailability({{ $available->id }})"><i
                                                                    class="fa fa-trash fa-2x"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <table class="table table-hover" id="example1" data-page-length='50'
                                                    style=" text-align: center;">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="8" class="text-center text-danger">There is
                                                                No Services available.</td>
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
                    {{ $availabilities->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
