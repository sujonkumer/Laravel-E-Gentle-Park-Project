@extends('Backend.layouts.mastertemplate')
@section('bodycontent')

<div class="container-fluid">
		 <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>

          <div class="row">
          	<div class="col-md-12">
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Upload The Category with Proper Information</h6>
                </div>
                <div class="card-body">
     
                    <form action="{{route('editcategory',$category->id )}}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Product Title">
                      </div>
                       <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" value="" placeholder="Product Description">{{ $category->desc }}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="parent category">Parent Category</label>
                        <select class="form-control" name="parent_id" >
                          <option value=" ">Please Select You Category</option>
                          @foreach ($primary_categories as $cat)
                          <option value="{{$cat->id}}" {{ $cat->id == $category->parent_id? 'Selected':''}}>{{ $cat->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="image">Category Image</label>
                        @if($category->image == NULL)
                        No Thumbnail
                        @else
                        <img src="{{ asset('image/category-image/' .$category->image )}}" width="100px">
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="image">New Category Image</label>
                        <input type="file" name="image" class="form-control" placeholder="">
                      </div>
                      
                      <div class="form-group">
                        <input type="submit" name="Edit Category" value="Update Value" class="btn btn-primary btn-block">
                      </div>

                      </form>

                </div>
              </div> 
            </div>
          </div>
	</div>

@endsection