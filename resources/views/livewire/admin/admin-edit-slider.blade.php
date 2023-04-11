<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Edit Slider</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Edit Slider</li>
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
                                            Edit Slider
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.slider') }}" class="btn btn-primary pull-right">All Sliders</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    {{--                                    @if(Session::has('message'))--}}
                                    {{--                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>--}}
                                    {{--                                    @endif--}}
                                    <form class="form-horizontal" wire:submit.prevent="updateSlide">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title" class="control-label col-sm-3">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="title" name="title" class="form-control"
                                                       placeholder="Title" wire:model="title" required/>
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="status" class="control-label col-sm-3">Status</label>
                                            <div class="col-sm-9">
                                                <select id="status" name="status" class="form-control" wire:model="status" required>
                                                    <option value="0">Inactive</option>
                                                    <option value="1">Active</option>
                                                </select>
                                                @error('service_category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="newImage" class="control-label col-sm-3">Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="newImage" name="newImage" class="form-control-file" wire:model="newImage"/>
                                                @if($newImage)
                                                    <img src="{{ $newImage->temporaryUrl() }}" width="20%" height="20%" alt="newImage">
                                                @else
                                                    <img src="{{ asset('images/slides') . '/' . $image }}" width="20%" height="20%" alt="image">
                                                @endif
                                                @error('newImage')
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
    </section>
</div>

