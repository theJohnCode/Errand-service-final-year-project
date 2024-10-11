<x-base-layout>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Edit Profile</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="semiboxshadow text-center">
        </div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="col-md-12 profile1" style="padding-bottom:40px;">
                        <div class="thinborder-ontop">
                            <h3>User Information</h3>
                            {{-- <x-jet-validation-errors class="mb-4" style="color: red;" /> --}}
                            <form id="userregisterationform" method="POST"
                                action="{{ route('customer.update', $user->id) }}">
                                @csrf
                                @method('PUT')

                                <div id="runnerDiv">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $user->name }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ $user->phone }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dob">Date of Birth</label>
                                                <input id="dob" type="date" class="form-control" name="dob"
                                                    value="{{ $user->dob }}">
                                                @error('dob')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state">State of Origin</label>
                                                <input type="text" class="form-control" name="state"
                                                    value="{{ $user->state }}">
                                                @error('state')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lga">LGA</label>
                                                <input type="text" class="form-control" name="lga"
                                                    value="{{ $user->lga }}">
                                                @error('lga')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="faculty">Faculty</label>
                                                <input type="text" class="form-control" id="faculty" name="faculty"
                                                    value="{{ $user->faculty }}">
                                                @error('faculty')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="department">Department</label>
                                                <input type="text" class="form-control" id="department"
                                                    name="department" value="{{ $user->department }}">
                                                @error('department')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="level">Current Level</label>
                                                <input type="number" class="form-control" id="level" name="level"
                                                    value="{{ $user->level }}">
                                                @error('level')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Residential Address</label>
                                            <textarea style="resize: none" class="form-control" name="address">{{ $user->address }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mb-0">
                                    <div class="col-md-10">

                                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-twitter">
            <i class="fa fa-twitter icon-big"></i>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            $(document).ready(function() {
                // Function to toggle visibility based on the selected value
                function toggleFields(selectedValue) {
                    if (selectedValue === '1') {
                        $('#school').closest('.col-md-6').show();
                        $('#faculty').closest('.col-md-6').show();
                        $('#level').closest('.col-md-6').show();
                        $('#department').closest('.col-md-6').show();
                    } else if (selectedValue === '0') {
                        $('#school').closest('.col-md-6').hide();
                        $('#faculty').closest('.col-md-6').hide();
                        $('#level').closest('.col-md-6').hide();
                        $('#department').closest('.col-md-6').hide();
                    }
                }

                // Get the value of the selected radio button on page load
                let selectedValue = $('input[name="is_student"]:checked').val();
                toggleFields(selectedValue); // Call the function to apply logic on page load

                // Listen for changes on the radio buttons
                $('input[name="is_student"]').change(function() {
                    selectedValue = $(this).val();
                    toggleFields(selectedValue); // Call the function again when the value changes
                });
            });
        </script>
    @endpush
</x-base-layout>
