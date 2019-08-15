@extends('layouts.default')
<br />
<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h3 class="display-6" align="center">Update a user</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
        @endif
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <h6>Name</h6>
                <input type="text" class="form-control" name="name" value={{ $user->name }} />
            </div>

            <div class="form-group">
                <h6>Gmail</h6>
                <input type="text" class="form-control" name="email" value={{ $user->email }} />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

