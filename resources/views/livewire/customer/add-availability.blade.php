<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Add Availability</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Add Availability</li>
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
                                            Add New Availability
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.all_services') }}"
                                                class="btn btn-primary pull-right">All Availability</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <form class="form-horizontal" wire:submit.prevent="createNewAvailability">
                                        @csrf

                                        <div class="form-group">
                                            <label for="available_from" class="control-label col-sm-3">Available
                                                From</label>
                                            <div class="col-sm-9">
                                                <input type="date" id="available_from" name="available_from"
                                                    class="form-control" placeholder="Service Slug"
                                                    wire:model="available_from" required />
                                                @error('available_from')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="available_until" class="control-label col-sm-3">Available
                                                Until</label>
                                            <div class="col-sm-9">
                                                <input type="date" id="available_until" name="available_until"
                                                    class="form-control" placeholder="Service Slug"
                                                    wire:model="available_until" required />
                                                @error('available_until')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="service_category_id"
                                                class="control-label col-sm-3">Service</label>
                                            <div class="col-sm-9">
                                                <select id="service_id" name="service_id" class="form-control"
                                                    wire:model="service_id" required>
                                                    <option value="">Select Service</option>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}">
                                                            {{ $service->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('service_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label col-sm-3">Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="description" name="description" placeholder="description" wire:model="description"></textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success pull-right">Add New</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
