@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6 mt-2">
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" value="Female"> Female
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" value="Male"> Male
                                  </label>
                                </div>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Annual Income') }}</label>

                            <div class="col-md-6">
                                <input id="annual_income" type="text" class="form-control @error('annual_income') is-invalid @enderror" name="annual_income" value="{{ old('annual_income') }}" required autocomplete="annual_income" autofocus>

                                @error('annual_income')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                  <select class="form-control" name="occupation" id="occupation">
                                    <option value="Private Job">Private Job</option>
                                    <option value="Government Job">Government Job</option>
                                    <option value="Business">Business</option>
                                  </select>
                                </div>

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Family Type') }}</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                  <select class="form-control" name="family_type" id="family_type">
                                    <option value="Joint Family">Joint Family</option>
                                    <option value="Nuclear Family">Nuclear Family</option>
                                  </select>
                                </div>

                                @error('family_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Manglik') }}</label>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <select class="form-control" name="manglik" id="manglik">
                                    <option value="Yes">Yes</option>
                                    <option value="No" selected>No</option>
                                  </select>
                                </div>

                                @error('manglik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="heading mt-3">
                            <div class="col-md-8 m-auto">
                                <h3>Partner Preference</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Expected Income') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="partner_expected_income" type="text" class="form-control @error('partner_expected_income') is-invalid @enderror" name="partner_expected_income" value="{{ old('partner_expected_income') }}" required autocomplete="partner_expected_income" autofocus> -->

                                <p>
                                  <label for="partner_expected_income">Range:</label>
                                  <input type="text" name="partner_expected_income" id="partner_expected_income" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                </p>
                                 
                                <div id="slider-range"></div>

                                @error('partner_expected_income')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Partner Occupation') }}</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                  <select class="selectpicker" multiple data-live-search="true" name="partner_occupation[]" id="partner_occupation">
                                    <option value="Private Job">Private Job</option>
                                    <option value="Government Job">Government Job</option>
                                    <option value="Business">Business</option>
                                  </select>
                                </div>

                                @error('partner_occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Partner Family Type') }}</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                  <select class="selectpicker" multiple data-live-search="true" name="partner_family_type[]" id="partner_family_type">
                                    <option value="Joint Family">Joint Family</option>
                                    <option value="Nuclear Family">Nuclear Family</option>
                                  </select>
                                </div>

                                @error('partner_family_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Partner Manglik') }}</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="partner_manglik" id="partner_manglik">
                                    <option value="Yes">Yes</option>
                                    <option value="No" selected>No</option>
                                  </select>
                                </div>

                                @error('partner_manglik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 100000,
      max: 5000000,
      values: [ 500000, 1000000 ],
      slide: function( event, ui ) {
        $( "#partner_expected_income" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#partner_expected_income" ).val( $( "#slider-range" ).slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) );
    } );

  </script>
@endsection
