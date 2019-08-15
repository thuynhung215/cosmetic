@extends('layouts.default')
@section('body')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        </br>
        <div class="row justify-content-center">
            <div class="col-lg-10 margin-tb">
                <div class="pull-left">
                    <h2>Categories List</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('categories.create')}}"> Create Category</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="text">
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead align="center">
                                <tr class="col-md-2" bgcolor="#faebd7">
                                    <th>Name</th>
                                    <th colspan = 2>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr align="center">
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <a href="{{ route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('categories.destroy', $category->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
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
    </br>
@endsection

