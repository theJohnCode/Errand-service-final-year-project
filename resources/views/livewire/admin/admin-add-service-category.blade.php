<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Add Service Category</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Add Service Category</li>
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
                                            Add New Service Category
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.service_categories') }}" class="btn btn-primary pull-right">All Task Categories</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
{{--                                    @if(Session::has('message'))--}}
{{--                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>--}}
{{--                                    @endif--}}
                                    <form class="form-horizontal" wire:submit.prevent="createNewCategory">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Category Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="name" name="name" class="form-control"
                                                       placeholder="Category Name" wire:model="name" wire:keyup="generateSlug" required/>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3">Category Slug</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="slug" name="slug" class="form-control" placeholder="Category Slug" wire:model="slug" required/>
                                                @error('slug')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="image" class="control-label col-sm-3">Category Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="image" name="image" class="form-control-file" wire:model="image" required/>
                                                @if($image)
                                                    <img src="{{ $image->temporaryUrl() }}" width="20%" height="20%" alt="image">
                                                @endif
                                                @error('image')
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

