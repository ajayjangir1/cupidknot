@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Occupation</th>
                  <th scope="col">Family Type</th>
                  <th scope="col">DOB</th>
                  <th scope="col">Annual Income</th>
                </tr>
              </thead>
              <tbody>
                @php 
                    $page = \Request::get('page');
                    $page = isset($page) ? $page : 1;
                @endphp
                @if($suggestions)
                    @foreach ( $suggestions as $key => $value ) 
                        <tr>
                          <th scope="row">{{ ($page - 1) * 10 + ($key + 1) }}</th>
                          <td>{{ $value->first_name.' '.$value->last_name}}</td>
                          <td>{{ $value->occupation }}</td>
                          <td>{{ $value->family_type }}</td>
                          <td>{{ date("d M Y", strtotime($value->dob)) }}</td>
                          <td>{{ $value->annual_income }}</td>
                        </tr>
                    @endforeach
                @endif
              </tbody>
            </table>
            {{ $suggestions->links() }}
        </div>
    </div>
</div>

@endsection