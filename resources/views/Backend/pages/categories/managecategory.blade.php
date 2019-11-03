@extends('Backend.layouts.mastertemplate')

@section('bodycontent')
<!-- Bigin page content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Manage All Category</h1>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"> View / Update / Delete Indivudual Category </h6>
        </div>
        <div class="card-body">
          
          <!-- View All Category Table Start -->
          
            <table class="table table-striped table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Parent Category</th>
                  <th scope="col">Category Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              @php 
                $i = 1;
              @endphp
              @foreach ($categories as $category)
                 <tr>
                  <th scope="row" class="align-middle">{{ $i }}</th>
                  <td class="align-middle">{{ $category->name }}</td>
                  <td class="align-middle">{{ $category->desc }}</td>
                  <td class="align-middle">
                      @if ($category->parent_id == NULL)
                          Primary Category
                      @else
                        {{$category->parent->name}}
                      @endif
                  </td>
                  <td class="align-middle">
                      @if($category->image == NULL)
                        No Thumbnail
                      @else
                      <img src="{{ asset('image/category-image/' .$category->image )}}" width="100px">
                      @endif
                  </td>
                  <td class="align-middle">
                    <div class="btn-group">

                      <!-- Product Update Button -->
                      <a href="{{ Route('editcategory',$category->id)}}" class="btn btn-primary ">Update</a>
                      <!-- Category Delete Button -->
                      <a href="#deletecategory{{ $category->id }}" class="btn btn-danger" data-toggle="modal" data-target="#deletecategory{{ $category->id }}">Delete</a>

                      <!-- Category Delete Model Content Start -->
                      <!-- Modal -->
                        <div class="modal fade" id="deletecategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Do You Want to Delete The Category ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('deletecategory', $category->id)}}" method="POST">
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-danger btn-block"> Confirm Delete</button>                                  
                                </form>
                                  
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <!-- Category Delete Model Content End -->
                    </div>
                  </td>
                </tr>
                @php
                 $i++;
               @endphp
               @endforeach
              </tbody>
            </table>
          <!-- View All Product Table End -->
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
