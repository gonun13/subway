@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Change your Order
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
      <form method="post" action="{{ route('orders.update', $order->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="bread">Bread:</label>
              <select class="form-control" name="bread">
                @foreach ($breads->all() as $bread)
                  <option value="{{ $bread->name }}" {{ $bread->name==$order->bread ? 'selected="selected"' : '' }}>{{ $bread->name }}
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="bread_size">Bread Size:</label>
              <select class="form-control" name="bread_size">
                <option value="15cm" {{ $order->bread_size=='15cm' ? 'selected="selected"' : '' }}>15 cm
                <option value="30cm" {{ $order->bread_size=='30cm' ? 'selected="selected"' : '' }}>30 cm
              </select>
          </div>
          <div class="form-group">
              <label for="baked">Baked:</label>
              <select class="form-control" name="baked">
                <option value="yes"  {{ $order->baked=='yes' ? 'selected="selected"' : '' }}>yes
                <option value="no"  {{ $order->baked=='no' ? 'selected="selected"' : '' }}>no
              </select>
          </div>
          <div class="form-group">
              <label for="taste">Taste:</label>
              <select class="form-control" name="taste">
                @foreach ($tastes->all() as $taste)
                  <option value="{{ $taste->name }}" {{ $order->taste==$taste->name ? 'selected="selected"' : '' }}>{{ $taste->name }}
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="extras">Extra's:</label>
              <select class="form-control" name="extras">
                <option value="extra_bacon" {{ $order->extras=='extra_bacon' ? 'selected="selected"' : '' }}>Extra Bacon
                <option value="double_meat" {{ $order->extras=='double_meat' ? 'selected="selected"' : '' }}>Double Meat
                <option value="extra cheese" {{ $order->extras=='extra_cheese' ? 'selected="selected"' : '' }}>Extra Cheese
              </select>
          </div>
          <div class="form-group">
              <label for="vegetables">Vegetables:</label>
              <select class="form-control" name="vegetables">
                @foreach ($vegetables->all() as $vegetable)
                  <option value="{{ $vegetable->name }}" {{ $order->vegetables==$vegetable->name ? 'selected="selected"' : '' }}>{{ $vegetable->name }}
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="sauce">Sauce:</label>
              <select class="form-control" name="sauce">
                @foreach ($sauces->all() as $sauce)
                  <option value="{{ $sauce->name }}" {{ $order->sauce==$sauce->name ? 'selected="selected"' : '' }}>{{ $sauce->name }}
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Edit Order</button>
      </form>
  </div>
</div>
@endsection
