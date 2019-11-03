@extends('Backend.layouts.mastertemplate')
@section('bodycontent')
	<!-- Bigin page content -->
  <div class="container-fluid">
		 <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800"> Upload New Product</h1>

          <div class="row">
          	<div class="col-md-12">
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Upload The Product with Proper Information</h6>
                </div>
                <div class="card-body">
     
                    <form action="{{Route('storeproduct')}}" method="POST" enctype="multipart/form-data">
                    @include('allinfo.messages')
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Product Title">
                      </div>
                       <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" placeholder="Product Description"></textarea>
                      </div>
                       <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Product Quantity">
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Product Price">
                      </div>
                      <div class="form-group">
                        <label for="offerprice">Offer Price</label>
                        <input type="number" name="offerprice" class="form-control" placeholder="Product Offer Price">
                      </div>
                      <div class="form-group">
                        <label for="product_image">Upload Product Image</label>
                        <input type="file" name="product_image[]">
                      </div>
                      <div class="form-group">
                        <label for="product_image">Upload Product Image</label>
                        <input type="file" name="product_image[]">
                      </div>
                      
                      <div class="form-group">
                        <input type="submit" name="addProduct" class="btn btn-primary btn-block">
                      </div>

                      </form>

                </div>
              </div> 
            </div>
          </div>
	</div>


@endsection