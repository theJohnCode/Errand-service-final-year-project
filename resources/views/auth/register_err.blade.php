<x-base-layout>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Errand Runner Registration</h1>
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
                            <form id="userregisterationform" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div id="runnerDiv">
                                    <input type="hidden" class="form-control" name="registerAs" value="ERR">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email
                                                    Address</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ old('email') }}">
                                                @error('email')
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
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Residential Address</label>
                                                <textarea style="resize: none" class="form-control" name="address">{{ old('address') }}</textarea>
                                                @error('address')
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
                                                <label">Are you a student?</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="is_student" id="studentYes" value="1"
                                                                    {{ old('is_student') == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="studentYes">
                                                                    Student
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="is_student" id="studentNo" value="0"
                                                                    {{ old('is_student') == 0 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="studentNo">
                                                                    Non Student
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('is_student')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dob">Date of Birth</label>
                                                <input id="dob" type="date" class="form-control" name="dob"
                                                    value="{{ old('dob') }}">
                                                @error('dob')
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
                                                <label for="state">State of Origin</label>
                                                <input type="text" class="form-control" name="state"
                                                    value="{{ old('state') }}">
                                                @error('state')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lga">LGA</label>
                                                <input type="text" class="form-control" name="lga"
                                                    value="{{ old('lga') }}">
                                                @error('lga')
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
                                                <label for="school">School</label>
                                                <select name="school" id="school" class="form-control">
                                                    <option>Select School</option>
                                                    <option value="nau"
                                                        {{ old('school') == 'nau' ? 'selected' : '' }}>Nnamdi Azikiwe
                                                        University</option>
                                                </select>
                                                @error('school')
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
                                                    value="{{ old('faculty') }}">
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
                                                <input type="text" class="form-control" id="department" name="department"
                                                    value="{{ old('department') }}">
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
                                                <input type="number" id="level" class="form-control" name="level"
                                                    value="{{ old('level') }}">
                                                @error('level')
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
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" />
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm
                                                    Password</label>
                                                <input type="password" class="form-control"
                                                    id="password_confirmation" name="password_confirmation" />
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mb-0">
                                    <div class="col-md-10">
                                        <span style="font-size: 14px;">If you have already registered <a
                                                href="{{ route('login') }}" title="Login">click here</a> to
                                            login</span>
                                        <button type="submit" class="btn btn-primary pull-right">Register</button>
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
