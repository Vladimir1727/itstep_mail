@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
               <div class="panel-heading">
               
				@if($subscriber->exists==true)
					Update subscriber
	 			@else
	 				{{trans('subscribers.addnew')}}
	 			@endif
               </div>
               <div class="panel-body">
			   
					@if($subscriber->exists===true)
						<form class="form-hirizontal" role="form" method="POST" action="{{url('/subscribers',$subscriber->id)}}">
						{{method_field('PUT')}}
	 				@else
						<form class="form-horizontal" role="form" method="POST" action="{{ url('/subscribers') }}">
						{{method_field('POST')}}
	 				@endif


						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
						   <label for="first_name" class="col-md-4 control-label">{{trans('subscribers.firstname')}}</label>

						   <div class="col-md-6">
							   <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name',$subscriber->first_name) }}" required autofocus>

							   @if ($errors->has('first_name'))
							   <span class="help-block">
								   <strong>{{ $errors->first('first_name') }}</strong>
							   </span>
							   @endif
						   </div>
						</div>
						
						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
						   <label for="last_name" class="col-md-4 control-label">{{trans('subscribers.lastname')}}</label>
							
						   <div class="col-md-6">
							   <input id="last_name" type="text" class="form-control" name="last_name" required value="{{ old('last_name',$subscriber->last_name) }}">

							   @if ($errors->has('last_name'))
								   <span class="help-block">
								   <strong>{{ $errors->first('last_name') }}</strong>
							   </span>
							   @endif
						   </div>
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						   <label for="last_name" class="col-md-4 control-label">E-Mail {{trans('subscribers.address')}}</label>

						   <div class="col-md-6">
							   <input id="email" type="email" class="form-control" name="email" required value="{{ old('email',$subscriber->email) }}">

							   @if ($errors->has('email'))
								   <span class="help-block">
								   <strong>{{ $errors->first('email') }}</strong>
							   </span>
							   @endif
						   </div>
						</div>
						<div class="form-group">
						   <div class="col-md-8 col-md-offset-4">
							   <button type="submit" class="btn btn-primary">
								   
	
								@if($subscriber->exists==true)
									{{trans('subscribers.update')}}
	 							@else
	 								{{trans('subscribers.add')}}
	 							@endif

							   </button>
						   </div>
						</div>
					</form>
                  
               </div>
           </div>
       </div>
   </div>
</div>

 
@endsection