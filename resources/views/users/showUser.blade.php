@extends('layouts.default')
@section('body')
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row justify-content-center">
        <div class="col-lg-10 margin-tb">
            <div class="pull-left">
                <h2>Users List</h2>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="text">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead align="center">
                            <tr bgcolor="#faebd7">
                                <th>Name</th>
                                <th>Email</th>
                                <th colspan = 2>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr align="center">
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</br>
@endsection

