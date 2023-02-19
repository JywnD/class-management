@extends('layouts.app')

@section('content')
    @include('layouts._messages')
    <div class="table-header">
        <div class="title">Course list</div>
    </div>
    <hr/>

    <div class="course-list">
      <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4">
                {{-- Modal confirm register course --}}
                <div class="modal fade" id="confirmRegisterModal{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmRegisterModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="confirmRegisterModalLabel">Confirm register</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Are you sure to resiter this course?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('student.register-course') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="courseId" value="{{ $course->id }}">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-primary" >Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="course-info">
                    <div class="card" data-toggle="modal" data-target="#confirmRegisterModal{{ $course->id }}">
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
