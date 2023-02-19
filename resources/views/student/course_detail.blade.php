@extends('layouts.app')

@section('content')
  @include('layouts._messages')
  <div class="course-list">
    <div class="row">
      <div class="col-md-6">
          <div class="course-info">
              <div class="card">
              <div class="card-header">
                  <h5 class="name">{{ $courseInfo['name'] }}</h5>
              </div>
              <div class="card-body">
                  <div class="attendances">
                    <strong>Attendances: </strong>
                    <span>{{ $courseInfo['attendances'] }}</span>
                  </div>
                  <div class="midterm-mark">
                    <strong>Midterm mark: </strong>
                    <span>{{ $courseInfo['midterm_mark'] ? $courseInfo['midterm_mark'] : 'Not yet' }}</span>
                  </div>
                  <div class="final-mark">
                    <strong>Midterm mark: </strong>
                    <span>{{ $courseInfo['final_mark'] ? $courseInfo['final_mark'] : 'Not yet' }}</span>
                  </div>
              </div>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection
