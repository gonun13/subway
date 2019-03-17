@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Order
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
      <form method="post" action="{{ route('orders.store') }}">
          <div class="form-group">
              @csrf
              <label for="bread">Bread:</label>
              <select class="form-control" name="bread">
                @foreach ($breads->all() as $bread)
                  <option value="{{ $bread->name }}">{{ $bread->name }}
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="bread_size">Bread Size:</label>
              <select class="form-control" name="bread_size">
                <option value="15cm">15 cm
                <option value="30cm">30 cm
              </select>
          </div>
          <div class="form-group">
              <label for="baked">Baked:</label>
              <select class="form-control" name="baked">
                <option value="yes">yes
                <option value="no">no
              </select>
          </div>
          <div class="form-group">
              <label for="taste">Taste:</label>
              <select class="form-control" name="taste">
                @foreach ($tastes->all() as $taste)
                  <option value="{{ $taste->name }}">{{ $taste->name }}
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="extras">Extra's:</label>
              <select class="form-control" name="extras">
                <option value="extra_bacon">Extra Bacon
                <option value="double_meat">Double Meat
                <option value="extra cheese">Extra Cheese
              </select>
          </div>
          <div class="form-group">
              <label for="vegetables">Vegetables:</label>
              <select class="form-control" name="vegetables">
                @foreach ($vegetables->all() as $vegetable)
                  <option value="{{ $vegetable->name }}">{{ $vegetable->name }}
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="sauce">Sauce:</label>
              <select class="form-control" name="sauce">
                @foreach ($sauces->all() as $sauce)
                  <option value="{{ $sauce->name }}">{{ $sauce->name }}
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Create Order</button>
      </form>
  </div>
</div>
@endsection
