@extends('layouts.app')
@section('content') 
<div class="card-box">

    <form action="{{ route('categories.update',$category->id) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Name</label>
        <input type="text" class="form-control" value="{{ $category->name }}" name="name">

        <label for="description">Description</label>
        <input type="text" class="form-control" value="{{ $category->description }}" name="description">

        <hr>
        <button type="submit" class="btn btn-success">Save changes</button>
    </form>

</div>
@endsection