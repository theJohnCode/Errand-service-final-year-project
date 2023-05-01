<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Edit Profile</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Edit Profile</li>
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
                                            Edit Profile
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" wire:submit.prevent="editProfile">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="newImage" class="control-label col-sm-3">Profile Image</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" id="newImage" name="newImage" class="form-control-file" wire:model="newImage"/>
                                                        @if($newImage)
                                                            <img src="{{ $newImage->temporaryUrl() }}" width="20%" height="20%" alt="image">
                                                        @elseif($image)
                                                            <img src="{{ asset('images/service_providers') . '/' . $image }}" width="20%" height="20%" alt="image">
                                                        @else
                                                            <img src="{{ asset('images/service_providers/default.png')}}" width="20%" height="20%" alt="image">
                                                        @endif
                                                        @error('newImage')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="about" class="control-label col-sm-3">About</label>
                                                    <div class="col-sm-9">
                                                        <textarea id="about" name="about" class="form-control" placeholder="About" wire:model="about" required></textarea>
                                                        @error('about')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="city" class="control-label col-sm-3">City</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="city" name="city" class="form-control" placeholder="City" wire:model="city" required/>
                                                        @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="featured" class="control-label col-sm-3">Service Category</label>
                                                    <div class="col-sm-9">
                                                        <select id="service_category_id" name="service_category_id" class="form-control" wire:model="service_category_id">
                                                            @foreach($serviceCategories as $serviceCategory)
                                                                <option value="{{ $serviceCategory->id}}">{{ $serviceCategory->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="city" class="control-label col-sm-3">Service Locations ZipCode / PinCode</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="service_locations" name="service_locations" class="form-control" placeholder="Service Locations ZipCode / PinCode" wire:model="service_locations" required/>
                                                        @error('service_locations')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-success pull-right">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

