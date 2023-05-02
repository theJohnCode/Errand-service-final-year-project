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
                        <li>All Messages</li>
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
                                            All Messages
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Created At</th>
                                            <th>Control</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($messages->count() > 0)
                                            @foreach($messages as $message)
                                                <tr>
                                                    <td>{{ $message->name }}</td>
                                                    <td>{{ $message->email }}</td>
                                                    <td>{{ $message->phone }}</td>
                                                    <td>{{ $message->title }}</td>
                                                    <td>{{ $message->message }}</td>
                                                    <td>{{ $message->created_at }}</td>
                                                    <td>
                                                        <a href="#" onclick="confirm('Are you sure you want to delete this Message?') ||
                                                            event.stopImmediatePropagation()" wire:click.prevent="deleteMessage({{ $message->id }})"><i class="fa fa-trash fa-2x"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                                                <tbody>
                                                <tr>
                                                    <td colspan="7" class="text-center text-danger">There is no Messages available.</td>
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
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
