@extends('client-site.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form method="POST" action="{{ route('register') }}" id="msform">
                @csrf
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active">Team Details</li>
                    <li>University Details</li>
                    <li>Team Member's Details</li>


                </ul>
                <!-- fieldsets -->
                <fieldset>
                    <h2 class="fs-title">Team Details</h2>
                    <h3 class="fs-subtitle">Tell us something more about your team</h3>
                    <input type="text" class="@error('team_name') is-invalid @enderror" value="{{ old('team_name') }}"
                        name="team_name" placeholder="Team Name" required autocomplete="team_name" autofocus
                        id="team_name" />
                    @error('team_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="text" name="team_leader_name" id="team_leader_name"
                        class="@error('team_leader_name') is-invalid @enderror" value="{{ old('team_leader_name') }}"
                        placeholder="Team Leader's Name" required autocomplete="team_leader_name" autofocus />

                    @error('team_leader_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus />

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <input type="tel" name="phone" id="phone" class="@error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}" placeholder="Phone Number" required autocomplete="phone" autofocus />

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror



                    <input type="text" name="linkedin" id="linkedin" class="@error('linkedin') is-invalid @enderror"
                        value="{{ old('linkedin') }}" placeholder="Team Leader's Linkedin Profile" required
                        autocomplete="linkedin" autofocus />

                    @error('linkedin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="button" name="next" id="first" disabled class="next action-button"
                        value="Next" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">University Details</h2>
                    <h3 class="fs-subtitle"></h3>



                    <label for="standard-select" class="select-label">What university are you from?</label>
                    <div class="select">
                        <select id="standard-select" name="what_uni_from"
                            class="@error('what_uni_from') is-invalid @enderror" required>
                            <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                            <option value="Option 4">Option 4</option>
                            <option value="Option 5">Option 5</option>
                            <option value="Option length">
                                Option that has too long of a value to fit
                            </option>
                        </select>
                        @error('what_uni_from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <input type="text" name="uni_id_number" id="uni_id_number"
                        class="@error('uni_id_number') is-invalid @enderror" value="{{ old('uni_id_number') }}"
                        placeholder="What is your university ID number" required autocomplete="uni_id_number" autofocus />

                    @error('uni_id_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror



                    <input type="text" name="uni_department" id="uni_department"
                        class="@error('uni_department') is-invalid @enderror" value="{{ old('uni_department') }}"
                        placeholder="What is your department" required autocomplete="uni_department" autofocus />

                    @error('uni_department')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <label for="standard-select" class="select-label">What year of studies are you in</label>
                    <div class="select">
                        <select id="standard-select" name="what_year_of_studires"
                            class="@error('what_year_of_studires') is-invalid @enderror">
                            <option value="1'st Year">1'st Year</option>
                            <option value="2'nd Yea">2'nd Year</option>
                            <option value="3'rd Year">3'rd Year</option>
                            <option value="4'th Year">4'th Year</option>
                            <option value="5'th Year">5'th Year</option>
                            <option value="graduate">Graduate</option>

                        </select>
                        @error('what_year_of_studires')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <label for="standard-select" class="select-label">When are you expecting to graduate?</label>
                    <div class="select">
                        <select id="standard-select" name="when_are_you_expecting_graduate"
                            class="@error('when_are_you_expecting_graduate') is-invalid @enderror">

                            @for ($i = 2022; $i <= 2040; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor


                        </select>
                        @error('when_are_you_expecting_graduate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="standard-select" class="select-label">How many members are in the team, including
                        yourself?</label>
                    <div class="select">
                        <select id="standard-select" name="how_many_member_team"
                            class="@error('how_many_member_team') is-invalid @enderror">
                            <option value="2">2 Members</option>
                            <option value="3">3 Members</option>

                        </select>
                        @error('how_many_member_team')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" id="second_step" disabled class="next action-button"
                        value="Next" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Team Member's Details</h2>
                    <h3 class="fs-subtitle">2nd Team Member :</h3>

                    <input type="text" name="second_team_member_name" id="second_team_member_name"
                        class="@error('second_team_member_name') is-invalid @enderror"
                        value="{{ old('second_team_member_name') }}" placeholder="2nd Team Member's Name" required
                        autocomplete="second_team_member_name" autofocus />

                    @error('second_team_member_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <input type="email" name="second_team_member_email" id="second_team_member_email"
                        class="@error('second_team_member_email') is-invalid @enderror"
                        value="{{ old('second_team_member_email') }}" placeholder="2nd Team Member's email" required
                        autocomplete="second_team_member_email" autofocus />

                    @error('second_team_member_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <input type="tel" name="second_team_member_phone" id="second_team_member_phone"
                        class="@error('second_team_member_phone') is-invalid @enderror"
                        value="{{ old('second_team_member_phone') }}" placeholder="2nd Team Member's Phone Number"
                        required autocomplete="second_team_member_phone" autofocus />

                    @error('second_team_member_phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <h3 class="fs-subtitle">3rd Team Member :</h3>

                    <input type="text" name="third_team_member_name" id="third_team_member_name"
                        class="@error('third_team_member_name') is-invalid @enderror"
                        value="{{ old('third_team_member_name') }}" placeholder="3rd Team Member's Name"
                        autocomplete="third_team_member_name" autofocus />

                    @error('third_team_member_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="email" name="third_team_member_email" id="third_team_member_email"
                        class="@error('third_team_member_email') is-invalid @enderror"
                        value="{{ old('third_team_member_email') }}" placeholder="3nd Team Member's email"
                        autocomplete="third_team_member_email" autofocus />

                    @error('third_team_member_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="tel" name="third_team_member_phone" id="third_team_member_phone"
                        class="@error('third_team_member_phone') is-invalid @enderror"
                        value="{{ old('third_team_member_phone') }}" placeholder="3rd Team Member's Phone Number"
                         autocomplete="third_team_member_phone" autofocus />

                    @error('third_team_member_phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <button type="submit" disabled id="final" class="next action-button">Submit</button>
                </fieldset>

            </form>

        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(window).load(function() {
            $('#first').val('disabled');
            $('#team_name').css({
                'border': "1px solid red"
            })
            $('#team_leader_name').css({
                'border': "1px solid red"
            })

            $('#email').css({
                'border': "1px solid red"
            })

            $('#phone').css({
                'border': "1px solid red"
            })

            $('#linkedin').css({
                'border': "1px solid red"
            })

            //---------second form

            $('#second_step').val('disabled');
            $('#uni_id_number').css({
                'border': "1px solid red"
            })
            $('#uni_department').css({
                'border': "1px solid red"
            })


            //---------third form

            $('#final').text('disabled');

            $('#second_team_member_name').css({
                'border': "1px solid red"
            })
            $('#second_team_member_email').css({
                'border': "1px solid red"
            })

            $('#second_team_member_phone').css({
                'border': "1px solid red"
            })

//
//            $('#third_team_member_name').css({
//                'border': "1px solid red"
//            })
//            $('#third_team_member_email').css({
//                'border': "1px solid red"
//            })
//
//            $('#third_team_member_phone').css({
//                'border': "1px solid red"
//            })






        })

        var team_name;
        var team_leader_name;
        var email;
        var phone;
        var linkedin;

        $('#team_name').on('keyup', function() {
            var coun = $(this).val();
            if (coun.length > 0) {
                team_name = 1;
                $('#team_name').css({
                    'border': "1px solid silver"
                })

                verify_first();

            } else {
                $('#first').val('disabled');
                $('#first').attr('disabled');
                $('#team_name').css({
                    'border': "1px solid red"
                })
            }
        })

        $('#team_leader_name').on('keyup', function() {
            var coun = $(this).val();
            if (coun.length > 0) {
                team_leader_name = 1;

                $('#team_leader_name').css({
                    'border': "1px solid silver"
                })
                verify_first();

            } else {
                $('#first').val('disabled');
                $('#first').attr('disabled');
                $('#team_leader_name').css({
                    'border': "1px solid red"
                })
            }
        })

        $('#email').on('keyup', function() {
            var coun = $(this).val();
            if (coun.length > 0) {
                email = 1;

                $('#email').css({
                    'border': "1px solid silver"
                })
                verify_first();

            } else {
                $('#first').val('disabled');
                $('#first').attr('disabled');
                $('#email').css({
                    'border': "1px solid red"
                })
            }
        })


        $('#phone').on('keyup', function() {
            var coun = $(this).val();
            if (coun.length > 0) {
                phone = 1;

                $('#phone').css({
                    'border': "1px solid silver"
                })
                verify_first();
            } else {
                $('#first').val('disabled');
                $('#first').attr('disabled');
                $('#phone').css({
                    'border': "1px solid red"
                })
            }
        })

        $('#linkedin').on('keyup', function() {
            var coun = $(this).val();
            if (coun.length > 0) {
                linkedin = 1;
                $('#linkedin').css({
                    'border': "1px solid silver"
                })
                verify_first();
            } else {
                $('#first').val('disabled');
                $('#first').attr('disabled');
                $('#linkedin').css({
                    'border': "1px solid red"
                })
            }
        })

        function verify_first() {
            if (this.team_name == 1 && this.team_leader_name == 1 && this.email == 1 && this.phone == 1 && this
                .linkedin == 1) {
                $('#first').val('next');
                $('#first').removeAttr('disabled');

            }
        }

        //---------second form--

        var uni_id_number;
        var uni_department;

        $('#uni_id_number').on('keyup', function() {
            var coun = $(this).val();
            if (coun.length > 0) {
                uni_id_number = 1;
                $('#uni_id_number').css({
                    'border': "1px solid silver"
                })

                verify_second();

            } else {
                $('#second_step').val('disabled');
                $('#second_step').attr('disabled');
                $('#uni_id_number').css({
                    'border': "1px solid red"
                })
            }
        })

        $('#uni_department').on('keyup', function() {
            var coun = $(this).val();
            if (coun.length > 0) {
                uni_department = 1;

                $('#uni_department').css({
                    'border': "1px solid silver"
                })
                verify_second();

            } else {
                $('#second_step').val('disabled');
                $('#second_step').attr('disabled');
                $('#uni_department').css({
                    'border': "1px solid red"
                })
            }
        })

        function verify_second() {
            if (this.uni_id_number == 1 && this.uni_department == 1) {
                $('#second_step').val('next');
                $('#second_step').removeAttr('disabled');

            }
        }


        // third step--

        var second_team_member_name;
        var second_team_member_email;
        var second_team_member_phone;
//        var third_team_member_name;
//        var third_team_member_email;
//        var third_team_member_phone;

        $('#second_team_member_name').on('keyup', function() {
            var coun = $(this).val();
            if (coun.length > 0) {

                second_team_member_name = 1;
                $('#second_team_member_name').css({
                    'border': "1px solid silver"
                })

                verify_final();

            } else {

                $('#final').attr('disabled');
                $('#final').text('disabled');
                $('#second_team_member_name').css({
                    'border': "1px solid red"
                })
            }
        })

        $('#second_team_member_email').on('keyup', function() {
            var coun = $(this).val();
            if (coun.length > 0) {
                second_team_member_email = 1;
                $('#second_team_member_email').css({
                    'border': "1px solid silver"
                })

                verify_final();

            } else {
                $('#final').attr('disabled');
                $('#final').text('disabled');
                $('#second_team_member_email').css({
                    'border': "1px solid red"
                })
            }
        })

        $('#second_team_member_phone').on('keyup', function() {
            var coun = $(this).val();
            if (coun.length > 0) {
                second_team_member_phone = 1;
                $('#second_team_member_phone').css({
                    'border': "1px solid silver"
                })

                verify_final();

            } else {
                $('#final').attr('disabled');
                $('#final').text('disabled');
                $('#second_team_member_phone').css({
                    'border': "1px solid red"
                })
            }
        })


//        $('#third_team_member_name').on('keyup', function() {
//            var coun = $(this).val();
//            if (coun.length > 0) {
//                third_team_member_name = 1;
//                $('#third_team_member_name').css({
//                    'border': "1px solid silver"
//                })
//
//                verify_final();
//
//            } else {
//                $('#final').attr('disabled');
//                $('#final').text('disabled');
//                $('#third_team_member_name').css({
//                    'border': "1px solid red"
//                })
//            }
//        })
//
//        $('#third_team_member_email').on('keyup', function() {
//            var coun = $(this).val();
//            if (coun.length > 0) {
//                third_team_member_email = 1;
//                $('#third_team_member_email').css({
//                    'border': "1px solid silver"
//                })
//
//                verify_final();
//
//            } else {
//                $('#final').attr('disabled');
//                $('#final').text('disabled');
//                $('#third_team_member_email').css({
//                    'border': "1px solid red"
//                })
//            }
//        })
//
//        $('#third_team_member_phone').on('keyup', function() {
//            var coun = $(this).val();
//            if (coun.length > 0) {
//                third_team_member_phone = 1;
//                $('#third_team_member_phone').css({
//                    'border': "1px solid silver"
//                })
//
//                verify_final();
//
//            } else {
//                $('#final').attr('disabled');
//                $('#final').text('disabled');
//                $('#third_team_member_phone').css({
//                    'border': "1px solid red"
//                })
//            }
//        })

         
        function verify_final() {
            if (this.second_team_member_name == 1 && this.second_team_member_email == 1 && this.second_team_member_phone ==
                1) {
                $('#final').text('submit');
                $('#final').removeAttr('disabled');

            }
        }
    </script>
@endsection
