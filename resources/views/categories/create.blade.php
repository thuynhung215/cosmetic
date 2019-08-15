@extends('layouts.default')
@section('body')
<br />
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h3 class="display-6" align="center">Update a user</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            @endif
            <form method="post" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <h6>Name</h6>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <button type="submit" class="btn btn-primary">Add category</button>
            </form>
        </div>
    </div>
</div>
@endsection
