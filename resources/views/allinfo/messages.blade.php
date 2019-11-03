
@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			 <span aria-hidden="true">&times;</span>
  		</button>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p> 
            @endforeach
        
    </div>
@endif

<!-- for success massage -->
@if (Session::has('success'))
	<div class="alert alert-success">
		<p>{{ session::get('success')}}</p>
	</div>

@endif


<!-- for error Message -->
@if (Session::has('errors'))
  <div class="alert alert-danger">
    <p>{{ session::get('errors')}}</p>
  </div>

@endif