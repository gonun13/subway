@extends('layouts.app')

@section('content')
<div class="col-lg-10 col-lg-offset-1">

    <h1><i class="fa fa-users"></i> User Administration</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="/users/{{ $user->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="/users/create" class="btn btn-success">Add User</a>

</div>
@endsection
