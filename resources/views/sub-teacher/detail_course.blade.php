@extends('layouts.app')

@section('content')
    @include('layouts._messages')
    <div class="table-header">
        <div class="title">Student list</div>
    </div>
    <div class="row">
      <div class="container">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Mark</th>
                  <th scope="col">Attendance</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
      </div>
  </div>
@endsection
