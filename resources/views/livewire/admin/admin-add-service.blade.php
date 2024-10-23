<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Add Task</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Add Task</li>
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
                                            Add New Task
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.all_services') }}"
                                                class="btn btn-primary pull-right">All Tasks</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <form class="form-horizontal" wire:submit.prevent="createNewService">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Service Name" wire:model="name"
                                                    wire:keyup="generateSlug" required />
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3">Slug</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="slug" name="slug" class="form-control"
                                                    placeholder="Service Slug" wire:model="slug" required />
                                                @error('slug')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tagline" class="control-label col-sm-3">Tagline</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tagline" name="tagline" class="form-control"
                                                    placeholder="tagline" wire:model="tagline" required />
                                                @error('tagline')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="service_category_id" class="control-label col-sm-3">Task
                                                Category</label>
                                            <div class="col-sm-9">
                                                <select id="service_category_id" name="service_category_id"
                                                    class="form-control" wire:model="service_category_id" required>
                                                    <option value="">Select Category</option>
                                                    @foreach ($serviceCategories as $serviceCategory)
                                                        <option value="{{ $serviceCategory->id }}">
                                                            {{ $serviceCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('service_category_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="price" class="control-label col-sm-3">Price</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="price" name="price" class="form-control"
                                                    placeholder="price" wire:model="price" required />
                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        {{-- <div class="form-group">
                                            <label for="discount" class="control-label col-sm-3">Discount</label>
                                            <div class="col-sm-9">
                                                <input type="number" id="discount" name="discount"
                                                    class="form-control" placeholder="discount" wire:model="discount"
                                                    required />
                                                @error('discount')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        {{-- <div class="form-group">
                                            <label for="discount_type" class="control-label col-sm-3">Discount
                                                Type</label>
                                            <div class="col-sm-9">
                                                <select id="discount_type" name="discount_type" class="form-control"
                                                    wire:model="discount_type" required>
                                                    <option value="">Select Discount Type</option>
                                                    <option value="fixed">Fixed</option>
                                                    <option value="percent">Percent</option>
                                                </select>
                                                @error('discount_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        <div class="form-group">
                                            <label for="description"
                                                class="control-label col-sm-3">Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="description" name="description" placeholder="description"
                                                    wire:model="description"></textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="image" class="control-label col-sm-3">Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="image" name="image"
                                                    class="form-control-file" wire:model="image" required />
                                                @if ($image)
                                                    <img src="{{ $image->temporaryUrl() }}" width="20%"
                                                        height="20%" alt="image">
                                                @endif
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="thumbnail" class="control-label col-sm-3">Thumbnail</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="thumbnail" name="thumbnail"
                                                    class="form-control-file" wire:model="thumbnail" required />
                                                @if ($thumbnail)
                                                    <img src="{{ $thumbnail->temporaryUrl() }}" width="20%"
                                                        height="20%" alt="thumbnail">
                                                @endif
                                                @error('thumbnail')
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
