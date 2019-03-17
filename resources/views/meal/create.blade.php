@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Meal
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('meals.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="status">Status:</label>
              <input type="radio" class="form-control" name="status" value="open">Open
              <input type="radio" class="form-control" name="status" value="closed" checked="checked">Closed
          </div>
          <button type="submit" class="btn btn-primary">Create User</button>
      </form>
  </div>
</div>
@endsection
