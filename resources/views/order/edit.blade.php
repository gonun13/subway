@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Meal
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
      <form method="post" action="{{ route('meals.update', $meal->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Meal:</label>
              <input type="text" class="form-control" name="name" value="{{$meal->name}}"/>
          </div>
          <div class="form-group">
              <label for="email">Status:</label>
              <input type="radio" class="form-control" name="status" value="open" {{ $meal->status=='open' ? 'checked' : '' }}>Open
              <input type="radio" class="form-control" name="status" value="closed" {{ $meal->status=='closed' ? 'checked' : '' }}>Closed
          </div>
          <button type="submit" class="btn btn-primary">Update Meal</button>
      </form>
  </div>
</div>
@endsection
