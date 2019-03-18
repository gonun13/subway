@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard 
                    @if (Auth::user()->isAdmin()) 
                        (<a href="/admin">Admin Panel</a>)
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($order)
                        Current order: <b>{{ $order->meal->name }}</b> (<a href="/orders/{{ $order->id }}/edit">change</a>)<br>
                        Bread {{ $order->bread }}<br>
                        Bread_size {{ $order->bread_size }}<br> 
                        Baked {{ $order->baked }}<br> 
                        Taste {{ $order->taste }}<br>
                        Extras {{ $order->extras }}<br>
                        Vegetables {{ $order->vegetables }}<br>
                        Sauce {{ $order->sauce }} 
                    @endif
                    <br><br>
                    Previous Meals
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Meal</th>
                                    <th>Order</th>
                                    <th>Date/Time Added</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $old)
                                    <tr>
                                        <td>{{ $old->meal->name }}</td>
                                        <td>
                                            Bread {{ $old->bread }}<br>
                                            Bread_size {{ $old->bread_size }}<br> 
                                            Baked {{ $old->baked }}<br> 
                                            Taste {{ $old->taste }}<br>
                                            Extras {{ $old->extras }}<br>
                                            Vegetables {{ $old->vegetables }}<br>
                                            Sauce {{ $old->sauce }}
                                        </td>
                                        <td>{{ $old->created_at }}</td>
                                        <td>{{ $old->meal->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
