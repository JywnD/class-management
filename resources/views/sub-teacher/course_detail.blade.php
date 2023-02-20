@extends('layouts.app')

@section('content')
  @include('layouts._messages')
  @php
    $isEdit = 0;
  @endphp
  <div class="table-header">
      <div class="title">Student list</div>
      <div>
        <button id="edit-course-button" type="button" class="btn btn-warning">
          Edit
        </button>
        <button id="save-course-button" type="button" class="btn btn-primary" style="display: none">
          Save
      </button>
    </div>
  </div>

  <div class="row">
    <div class="container">
      <form id="edit-course-form" action="{{ route('teacher.edit-course') }}" method="post">
        @csrf
        <input type="hidden" name="courseId" value="{{ $courseInfo['0']->id }}">
        <table class="table table-striped"  id="is-edit-table" style="display: none">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Midterm mark</th>
              <th scope="col">Final mark</th>
              <th scope="col">Attendances</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($courseInfo as $key => $item)
              <tr>
                <th style="font-weight: 400">{{ $key + 1 }}</th>
                <th style="font-weight: 400">{{ $item->studentName }}</th>
                <th style="font-weight: 400">{{ $item->studentEmail }}</th>
                <th style="font-weight: 400">
                  <input class="form-control mark" type="number" value="{{ $item->midtermMark }}" name="midtermMark-{{ $item->studentId}}" min="0">
                </th>
                <th style="font-weight: 400">
                  <input class="form-control mark" type="number" value="{{ $item->finalMark }}" name="finalMark-{{ $item->studentId}}" min="0">
                </th>
                <th style="font-weight: 400">
                  <input class="form-control attendances" type="number" value="{{ $item->attendances }}" name="attendances-{{ $item->studentId}}" min="0">
                </th>
              </tr>
            @endforeach
          </tbody>
        </table>
      </form>

      <table class="table table-striped"  id="normal-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Midterm mark</th>
            <th scope="col">Final mark</th>
            <th scope="col">Attendances</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($courseInfo as $key => $item)
            <tr>
              <th  style="font-weight: 400">{{ $key + 1 }}</th>
              <th  style="font-weight: 400">{{ $item->studentName }}</th>
              <th  style="font-weight: 400">{{ $item->studentEmail }}</th>
              <th style="font-weight: 400"><span>{{ $item->midtermMark ? $item->midtermMark : 'Not yet' }}</span></th>
              <th style="font-weight: 400"><span>{{ $item->finalMark ? $item->finalMark : 'Not yet' }}</span></th>
              <th style="font-weight: 400">{{ $item->attendances }}</th>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
