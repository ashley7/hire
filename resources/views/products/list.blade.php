@extends('layouts.app')
@section('content') 

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_product">
    Add New Product
</button>

<hr style="background-color: #12cd22; height:1px"> 


<div class="card-box">
    <div class="table-responsive">
        <table class="table" id="table_unsorted">
            <thead>
                <th>Name</th> <th>Description</th> <th>Price</th> <th>Action</th>
            </thead>

            <tbody>
                @foreach($products as $product)

                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{!! $product->description !!}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>
                      <a href="{{ route('products.edit',$product->id) }}">Edit</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <form action="{{ route('products.store') }}" method="post">
                @csrf
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">

                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>

                <label for="price">Daily Hire Price</label>
                <input type="number" class="form-control" name="price">

                <hr>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
       
      </div>
    
    </div>
  </div>
</div>



@endsection

@include("layouts.data_tables")