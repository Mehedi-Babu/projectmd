@extends('backend.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Account Settings</h4>
                <p class="card-description">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </p>
                <form class="forms-sample" action="{{ route('ProfileUpdate') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Full Name</label>
                        <input type="text" class="form-control" id="team_leader_name"
                            value="{{ @$user->team_leader_name }}" name="team_leader_name" readonly
                            placeholder="Full Name" name="team_leader_name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Email Address</label>
                        <input type="text" class="form-control" id="email_address" readonly placeholder="Email Address"
                            name="email" value="{{ @$user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" readonly placeholder="Phone Number"
                            value="{{ @$user->phone }}" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Linkedin Profile</label>
                        <input type="text" class="form-control" id="linkedin_profile" placeholder="Linkedin Profile"
                            value="{{ @$user->linkedin }}" name="linkedin" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">What is your university ID number?</label>
                        <input type="text" class="form-control" id="university_id" placeholder="University ID number"
                            name="uni_id_number" value="{{ @$user->uni_id_number }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">What is your department?</label>
                        <input type="text" class="form-control" id="department" placeholder="Department"
                            name="uni_department" value="{{ @$user->uni_department }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">What year of studies are you in?</label>
                        <input type="text" class="form-control" id="year"
                            value="{{ @$user->what_year_of_studires }}" placeholder="1-5 or Graduated"
                            name="what_year_of_studires" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">When are you expecting to graduate?</label>
                        <input type="text" class="form-control" id="graduate"
                            value="{{ @$user->when_are_you_expecting_graduate }}" placeholder="2022"
                            name="when_are_you_expecting_graduate" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">One Time Password</label>
                        <input type="passwoard" class="form-control" id="otp" placeholder="One Time Password"
                            name="otp" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">New Password</label>
                        <input type="passwoard" class="form-control" id="new_password" placeholder="New Password"
                            name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Confirm New Password</label>
                        <input type="passwoard" class="form-control" id="confirm_new_password"
                            placeholder="Confirm New Password" name="confirm_new_password" required>
                    </div>






                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
