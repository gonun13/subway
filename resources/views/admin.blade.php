@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Panel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->isAdmin())
                        Welcome master!
                    @endif
                    <br><br>
                    <a href="/users">Manage Users</a> - <a href="/meals">Manage Meals</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
