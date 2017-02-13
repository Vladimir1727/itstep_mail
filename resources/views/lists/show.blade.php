@extends('layouts.app')
@section('content')
<div class="container">
@if ( \Session::has('flash_message') )
   <div class="alert alert-success alert-dismissable">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{\Session::get('flash_message')}}
   </div>
@endif
<div class="row">
	<div class="panel panel-default col-md-6">
        <div class="panel-heading">
           <div class="row">
               {{trans('subscribers.title')}}
           </div>
       </div>
       <div class="panel-body">
	<table class="table table-striped task-table">

				   <!-- Table Headings -->
		   <thead>
		   <th>{{trans('lists.name')}}</th>
				<th></th>
				<th></th>
				   </thead>
		<tbody>
		@foreach ($subscribers as $subscriber)
						<tr>
							<td>
								{{$subscriber->first_name}}
								</td>
							<td>
								{{$subscriber->last_name}}
							</td>
							<td>
								<form action="{{url('/lists/addsubscriber')}}" method="post">
									{{csrf_field()}}
									<input type="hidden" name="subscriber_id" value="{{$subscriber->id}}">
									<input type="hidden" name="list_id" value="{{$list->id}}">
									<button class="btn btn-success">{{trans('subscribers.add')}}</button>
								</form>
							</td>
						</tr>
		@endforeach
		</tbody>
		</table>
		{{$subscribers->links()}}
	</div>
	</div>
   <div class="panel panel-default col-md-6">
        <div class="panel-heading">
           <div class="row">
               {{trans('lists.list')}}: <b>{{$list->name}}</b>
           </div>
       </div>
       <div class="panel-body">
       	<table class="table table-striped task-table">

				   <!-- Table Headings -->
		   <thead>
		   <th>{{trans('lists.name')}}</th>
				<th></th>
				<th></th>
				   </thead>

				   <!-- Table Body -->
				   <tbody>
				   @foreach ($list_subscribers as $sublist)
						<tr>
							<td>
								{{$sublist->first_name}}
								</td>
							<td>
								{{$sublist->last_name}}
							</td>
							<td>
								<form action="{{url('/lists/delsubscriber')}}" method="post">
									{{csrf_field()}}
									<input type="hidden" name="subscriber_id" value="{{$sublist->id}}">
									<input type="hidden" name="list_id" value="{{$list->id}}">
									<button class="btn btn-danger">{{trans('subscribers.delete')}}</button>
								</form>
							</td>
						</tr>
					@endforeach
				   </tbody>
			</table>
			
       </div>
   </div>
</div>
</div>
@endsection