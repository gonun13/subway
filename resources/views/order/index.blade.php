@extends('layouts.app')

@section('content')
<div class="col-lg-10 col-lg-offset-1">

    <h1><i class="fa fa-users"></i> Meal Administration</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date/Time Added</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($meals as $meal)
                <tr>
                    <td>{{ $meal->name }}</td>
                    <td>{{ $meal->status }}</td>
                    <td>{{ $meal->created_at }}</td>
                    <td>
                        <a href="/meals/{{ $meal->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="/meals/create" class="btn btn-success">Add Meal</a>

</div>
@endsection
