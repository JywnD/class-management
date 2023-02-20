@extends('layouts.app')

@section('content')
    @include('layouts._messages')
    <div class="table-header">
        <div class="title">Student Table</div>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createStudenModal">
                Create Student
            </button>
        </div>
    </div>
    <!-- Modal -->
    @include('form-teacher.create_student')
    <div class="row">
        <div class="container">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $student->code }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->date_of_birth }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <form class="form-delete" action="{{route('delete-student', $student->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
