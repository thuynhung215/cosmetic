@extends('layouts.default')
@section('body')
<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h3 class="display-6" align="center">Update a category</h3>

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
        <form method="post" action="{{ route('categories.update', $category->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <h6>Name</h6>
                <input type="text" class="form-control" name="name" value={{ $category->name }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
