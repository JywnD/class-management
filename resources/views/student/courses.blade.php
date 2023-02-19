@extends('layouts.app')

@section('content')
    @include('layouts._messages')
    <div class="table-header">
        <div class="title">My course list</div>
    </div>
    <hr/>

    <div class="course-list">
      <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4">
                <a class="course-info" href="{{ route('student.course-detail', $course->id) }}">
                    <div class="card">
                    <div class="card-header">
                        <h5 class="name">{{ $course->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="detail">{{ $course->detail }}</div>
                        <div class="duration">{{ $course->start_date }} ~ {{ $course->end_date }}</div>
                    </div>
                    </div>
                </a>
            </div>
        @endforeach
      </div>
    </div>
@endsection
