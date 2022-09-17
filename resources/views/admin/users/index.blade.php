<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="heading">
                <h3>Filters</h3>
            </div>
            <form method="post" action="{{ route('users.list') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="gender" class="col-form-label font-weight-bold">Gender</label><br>
                        <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" <?php if(isset($requestData['gender']) && $requestData['gender'] == 'Male') echo "checked"; ?> >
                              <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" <?php if(isset($requestData['gender']) && $requestData['gender'] == 'Female') echo "checked"; ?>>
                              <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="family_type" class="col-form-label font-weight-bold">Family Type</label><br>
                        <select class="form-control" name="family_type">
                            <option value="">Select Family Type</option>
                            <option value="Joint Family" <?php if(isset($requestData['family_type'] ) && $requestData['family_type'] == 'Joint Family') echo "selected"; ?> >Joint Family</option>
                            <option value="Nuclear Family" <?php if(isset($requestData['family_type'] ) && $requestData['family_type'] == 'Nuclear Family') echo "selected"; ?> >Nuclear Family</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="manglik" class="col-form-label font-weight-bold">Manglik</label><br>
                        <select class="form-control" name="manglik">
                            <option value="">Select</option>
                            <option value="Yes" <?php if(isset($requestData['manglik'] ) && $requestData['manglik'] == 'Yes') echo "selected"; ?> >Yes</option>
                            <option value="No" <?php if(isset($requestData['manglik'] ) && $requestData['manglik'] == 'No') echo "selected"; ?> >No</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-1">
                        <div class="form-group">
                            <label for="age" class="font-weight-bold">Age</label>
                            <input type="number" name="age" class="form-control" id="age" placeholder="Enter Age" value="<?php echo isset($requestData['age']) ? $requestData['age'] : null; ?>" >
                        </div>
                    </div>
                </div>
                <div class="row mt-2 ml-1">
                    <label for="range" class="col-form-label font-weight-bold">Income</label><br>
                    <div class="col-md-12">
                        <p>
                            <label for="income_range">Range:</label>
                            <input type="text" name="income_range" id="income_range" readonly style="border:0; color:#f6931f; font-weight:bold;">
                        </p>
                         
                        <div id="slider-range"></div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-6">
                        <button type='submit' class="btn btn-primary">Submit</button>
                        <button type='button' class="btn btn-info ml-1" id="reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-10 m-auto">
            <div class="heading">
                <h3>Users List</h3>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Age</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Occupation</th>
                  <th scope="col">Family Type</th>
                  <th scope="col">Annual Income</th>
                  <th scope="col">Manglik</th>
                </tr>
              </thead>
              <tbody>
                @php 
                    $page = \Request::get('page');
                    $page = isset($page) ? $page : 1;
                @endphp
                @if($users)
                    @foreach ( $users as $key => $value ) 
                        @php
                            $age = date_diff(date_create($value->dob), date_create('today'))->y;
                        @endphp
                        <tr>
                          <th scope="row">{{ ($page - 1) * 10 + ($key + 1) }}</th>
                          <td>{{ $value->first_name.' '.$value->last_name}}</td>
                          <td>{{ $age.' years' }}</td>
                          <td>{{ $value->gender }}</td>
                          <td>{{ $value->occupation }}</td>
                          <td>{{ $value->family_type }}</td>
                          <td>{{ $value->annual_income }}</td>
                          <td>{{ $value->manglik }}</td>
                        </tr>
                    @endforeach
                @endif
              </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 100000,
      max: 5000000,
      values: [ "{{ isset($requestData['minIncome']) ? $requestData['minIncome'] : 100000 }}", "{{ isset($requestData['maxIncome']) ? $requestData['maxIncome'] : 100000 }}" ],
      slide: function( event, ui ) {
        $( "#income_range" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#income_range" ).val( $( "#slider-range" ).slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) );
    } );

    $("#reset").click(function() {
        window.location.href = "{{ route('users.list') }}";
    })

</script>
</body>
</html>