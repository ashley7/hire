@extends('layouts.app')
@section('content') 

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_category">
    Add New Category
</button>

<hr style="background-color: #12cd22; height:1px"> 

<div class="card-box">
    <div class="table-responsive">
        <table class="table" id="table_unsorted">
            <thead>
                <th>Name</th> <th>Phone Number</th> <th>Action</th>
            </thead>

            <tbody>
                @foreach($categories as $category)

                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                      <a href="{{ route('categories.edit',$category->id) }}" class="badge badge-info p-1">Edit</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
 
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description">

                <hr>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
       
      </div>
    
    </div>
  </div>
</div>
@endsection
@include("layouts.data_tables")