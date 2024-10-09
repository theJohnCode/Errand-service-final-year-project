<div class="col col-md-3">
    <div class="panel-group" id="accordion">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard</a>
                </h4>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Users</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <ul class="list-group">
                    <li class="list-group-item"> <a
                            href="{{ route('admin.errand.runner') }}">Errand Runners</a></li>
                    <li class="list-group-item"> <a
                            href="{{ route('admin.errand.client') }}">Errand Clients</a></li>
                    <li class="list-group-item"> <a
                            href="{{ route('admin.admins') }}">Admins</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
