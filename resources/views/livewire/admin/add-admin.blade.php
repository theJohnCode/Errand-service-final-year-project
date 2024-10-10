<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Add Admin</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Add Admin</li>
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
                                            Add New Admin
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.admins') }}"
                                                class="btn btn-primary pull-right">All Admins</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <form class="form-horizontal" wire:submit.prevent="createAdmin">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Name" wire:model="name"
                                                    required />
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="email" name="email" class="form-control"
                                                    placeholder="Email" wire:model="email"
                                                    required />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="phone" name="phone" class="form-control"
                                                    placeholder="Phone" wire:model="phone"
                                                    required />
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" id="name" name="password" class="form-control"
                                                     wire:model="password"
                                                    required />
                                                @error('password')
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
