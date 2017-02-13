@extends('layouts.app')
@section('content')
<div class="container">
   <div class="panel panel-default">
   @if ( \Session::has('flash_message') )
   <div class="alert alert-success alert-dismissable">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{\Session::get('flash_message')}}
   </div>
	@endif
       <div class="panel-heading">
           <div class="row">
               <div class="col-md-10">
                   {{trans('lists.title')}}
               </div>
               <div class="col-md-2">
                   <a class="btn btn-default" href="{{url('/lists/create')}}">{{trans('lists.add')}}</a>
               </div>
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
				   @foreach ($lists as $list)
						<tr>
							<td class="table-text">
								<div>
									{{$list->name}}
								</div>
							</td>
							<td>
								<form action="{{url('/lists',[$list->id,'edit'])}}" method="post">
									{{csrf_field()}}
									{{method_field('GET')}}
									<button class="btn btn-success">{{trans('lists.update')}}</button>
								</form>
							</td>
							<td>
								<form action="{{url('/lists',[$list->id])}}" method="post">
									{{csrf_field()}}
									{{method_field('get')}}
									<button class="btn btn-info">
										subscribers
									</button>
								</form>
							</td>
							<td>
								<form action="{{url('/lists',[$list->id])}}" method="POST">
									{{csrf_field()}}
									{{method_field('DELETE')}}
									<button class="btn btn-danger">
										{{trans('lists.delete')}}
									</button>
								</form>
							</td>

						</tr>
				   @endforeach
				   <tbody>
				   </tbody>
			</table>
			{{$lists->links()}}
       </div>
   </div>
</div>
@endsection