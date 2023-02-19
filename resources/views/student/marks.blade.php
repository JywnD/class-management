@extends('layouts.app')

@section('content')
  @include('layouts._messages')
  <div class="table-header">
      <div class="title">My scoreboard</div>
  </div>
  <div class="row">
    <div class="container">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Course name</th>
            <th scope="col">Start date</th>
            <th scope="col">End date</th>
            <th scope="col">Midterm mark</th>
            <th scope="col">Final mark</th>
            <th scope="col">Attendances</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($coursesInfo as $item)
          <tr>
            <th  style="font-weight: 400">{{ $item->name }}</th>
            <th  style="font-weight: 400">{{ $item->startDate }}</th>
            <th  style="font-weight: 400">{{ $item->endDate }}</th>
            <th  style="font-weight: 400">{{ $item->midtermMark ? $item->midtermMark : 'Not yet'}}</th>
            <th  style="font-weight: 400">{{ $item->finalMark ? $item->finalMark : 'Not yet' }}</th>
            <th  style="font-weight: 400">{{ $item->attendances }}</th>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
