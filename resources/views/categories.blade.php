@extends('layouts.apps')

@section('content')

<div class="container">
	<div class="row">
		@foreach($categories as $categorie)
	        	<div class="col-md-4">
	        		<div class="project">
	        			<div class="img rounded mb-4" style=" height: 100px; text-align: center; " >
	        				<img src="{{url('img/categorie.png')}}" style="margin-top: 10px; height:80px; ">
	        				
	        			</div>
	        			<div class="text w-100 text-center">
	        				<span class="cat"><a href="">{{$categorie->name}}</a></span>
	        	<!--<h3><a href="#">Consultacy Solutions</a></h3>-->
	        			</div>
	        		</div>
	        	</div>
		@endforeach
      	
	 </div>       	
	
</div>
 
@endsection