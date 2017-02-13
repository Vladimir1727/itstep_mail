@extends('layouts.app')
@section('content')
 <div class="row">
 	<div class="col-md-8 col-md-offset-2">
 		<div class="panel panel-default">
 			<div class="panel-heading">
 			@if($list->exists==true)
				Update list
 			@else
 				{{trans('lists.titlenew')}}
 			@endif
 			</div>
 			<div class="panel-body">
 				@if($list->exists===true)
					<form class="form-hirizontal" role="form" method="POST" action="{{url('/lists',$list->id)}}">
					{{method_field('PUT')}}
 				@else
					<form class="form-hirizontal" role="form" method="POST" action="{{url('/lists')}}">
					{{method_field('POST')}}
 				@endif
 				
 					{{csrf_field()}}
 					<div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					   <label for="name" class="col-md-2 control-label">{{trans('lists.name')}}</label>

					   <div class="col-md-4">
					       <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$list->name) }}" required autofocus>

					       @if ($errors->has('name'))
					           <span class="help-block">
					           <strong>{{ $errors->first('name') }}</strong>
					       </span>
					       @endif

					   </div>
						
	 						<div class="col-md-2 col-md-offset-2">
	 							<button type="submit" class="btn btn-primary">
	 							@if($list->exists==true)
									{{trans('lists.update')}}
	 							@else
	 								{{trans('lists.add')}}
	 							@endif
	 							</button>
	 						</div>
	 				
					</div>

 					
 				</form>
 			</div>
 		</div>
 	</div>
 </div>
@endsection