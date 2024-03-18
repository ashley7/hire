@extends('layouts.app')
@section('content') 

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_product">
    Add New Product
</button>

<hr style="background-color: #12cd22; height:1px"> 


<div class="card-box">

    <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $product->name }}">

        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10">{!! $product->description !!}</textarea>

        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" value="{{ $product->price }}">

        <label for="image_files">Add Images</label> <br>
        <input type="file" multiple name="image_files[]" accept="image/*">
        <hr>
        <button type="submit" class="btn btn-success">Save changes</button>
    </form>
     
</div>
 



@endsection

@include("layouts.data_tables")