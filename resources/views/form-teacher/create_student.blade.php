@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
      <div class="card-title">
          <h2>Create new student</h2>
      </div>
      <hr>
      <form action="{{ route('store-student') }}" method="POST">
          @csrf
          <div class="form-group">
              @if ($errors->has('content'))
                  <div class="invalid-feedback">
                      <strong>{{ $errors->first('content') }}</strong>
                  </div>
              @endif
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-name">Name</span>
                </div>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-email">Email</span>
                </div>
                <input type="email" name="email" class="form-control"  required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-password">Password</span>
                </div>
                <input type="password" name="password" class="form-control" required>
              </div>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-outline-primary">Submit</button>
          </div>
      </form>
  </div>
</div>
@endsection
