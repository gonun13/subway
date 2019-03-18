@extends('layouts.app')

@section('content')
<div class="col-lg-10 col-lg-offset-1">

    <h1><i class="fa fa-users"></i> Current Orders</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Order</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        Bread {{ $order->bread }}<br>
                        Bread_size {{ $order->bread_size }}<br> 
                        Baked {{ $order->baked }}<br> 
                        Taste {{ $order->taste }}<br>
                        Extras {{ $order->extras }}<br>
                        Vegetables {{ $order->vegetables }}<br>
                        Sauce {{ $order->sauce }}
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
