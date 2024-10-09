<div>
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-12">
                <h1>Errand Runners</h1>
            </div>
        </div>

        @livewire('sidebar')

        <div class="col col-md-9">

            <div class="row portfolioContainer">
                <div class="col-md-12 profile1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    All Errand Runners
                                </div>
                                <div class="col-md-6">
                                    {{-- <a href="{{ route('admin.add_service') }}" class="btn btn-primary pull-right">Add
                                        New</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Student</th>
                                        <th>DOB</th>
                                        <th>State</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th>Faculty</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        {{-- <th>Created At</th> --}}
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->count() > 0)
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    @if ($user->is_student)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>{{ $user->dob }}</td>
                                                <td>{{ $user->state }}</td>
                                                <td>{{ $user->department }}</td>
                                                <td>{{ $user->level }}</td>
                                                <td>{{ $user->faculty }}</td>
                                                <td>
                                                    @if ($user->active_status)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>

                                                <td>
                                                    <image src="{{ asset('storage/users-avatar/' . $user->avatar) }}"
                                                        width="50" height="50"></image>
                                                </td>

                                                {{-- <td>{{ $user->created_at }}</td> --}}
                                                <td>
                                                    {{-- <a
                                                        href="{{ route('admin.errand.runner.edit', ['runner_id' => $user->id]) }}">
                                                        <i class="fa fa-edit "></i>
                                                    </a> --}}
                                                    <a href="#"
                                                        onclick="confirm('Are you sure you want to delete this errand runner?') ||
                                                                    event.stopImmediatePropagation()"
                                                        wire:click.prevent="deleteRunner({{ $user->id }})"><i
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
                                                        no Errand Runner available.</td>
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
            {{ $users->links() }}

        </div>
    </div>
</div>
