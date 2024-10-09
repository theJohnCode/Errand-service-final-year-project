
<div>
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-12">
                <h1>Admin Dashboard</h1>
            </div>
        </div>

        @livewire('sidebar')

        <div class="col col-md-9">
            <div class="row">
                <div class="col col-md-5">
                    Total Errand Clients
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary" role="progressbar"
                            aria-valuenow="15"aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            {{ $totalErC }}</div>
                    </div>

                    Total Errand Runners
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar"
                            aria-valuenow="30"aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            {{ $totalErR }}</div>
                    </div>

                    Total Admins
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar"
                            aria-valuenow="8"aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            {{ $totalAdm }}</div>
                    </div>
                </div>
                <div class="col col-md-5">
                    Total Active Services
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar"
                            aria-valuenow="45"aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            {{ $totalActiveServices }}</div>
                    </div>

                    Total Featured Services
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary" role="progressbar"
                            aria-valuenow="57"aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            {{ $totalFeaturedServices }}</div>
                    </div>

                    Total Service Categories
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar"
                            aria-valuenow="25"aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            {{ $totalServiceCat }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
