@extends('Backend.layouts.mastertemplate')
@section('bodycontent')
	<!-- Bigin page content -->
  <div class="container-fluid">
		 <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800"> Upload New Category</h1>

          <div class="row">
          	<div class="col-md-12">
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Upload The Category with Proper Information</h6>
                </div>
                <div class="card-body">
     
                <form action="{{ route('storecategory')}}" method="POST" enctype="multipart/form-data"> 
                       @include('allinfo.messages')

                       {{ csrf_field() }}

                      <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="name" class="form-control" placeholder="Category Name">
                      </div>

                       <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" placeholder="Category Description"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="parent_category">Parent Category</label>
                        <select class="form-control" name="parent_id">
                          <option value=" ">Please Select A Primary Category</option>
                            @foreach ($primary_categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                       </select>
                       
                      </div>

                      <div class="form-group">
                        <label for="image">Upload Category Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Category Name">
                      </div>


                      <br>
                      <div class="form-group">
                        <input type="submit" name="addCategory" value="Add Category" class="btn btn-primary btn-block">
                      </div>

                      </form>

                </div>
              </div> 
            </div>
          </div>
	</div>


@endsection