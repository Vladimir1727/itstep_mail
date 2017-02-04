@extends('layouts.app')
@section('content')
 <div class="row">
 	<div class="col-md-8 col-md-offset-2">
 		<div class="panel panel-default">
 			<div class="panel-heading">
 				List Add New
 			</div>
 			<div class="panel-body">
 				<form class="form-hirizontal" role="form" method="post" action="{{url('/lists')}}">
 					{{csrf_field()}}
 					<div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					   <label for="name" class="col-md-2 control-label">Name</label>

					   <div class="col-md-4">
					       <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

					       @if ($errors->has('name'))
					           <span class="help-block">
					           <strong>{{ $errors->first('name') }}</strong>
					       </span>
					       @endif

					   </div>
						
	 						<div class="col-md-2 col-md-offset-2">
	 							<button type="submit" class="btn btn-primary">
	 								Add
	 							</button>
	 						</div>
	 				
					</div>

 					
 				</form>
 			</div>
 		</div>
 	</div>
 </div>
@endsection