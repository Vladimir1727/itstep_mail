@extends('layouts.app')


@section('content')
<div class="row">
	<div class="col-md-2">
		<div class="btn-group-vertical">
			<a href="{{url('/subscriber/list') }}" class="btn btn-default">{{trans('app.subscribers')}}</a>
			<a href="{{url('/lists') }}" class="btn btn-default">{{trans('app.lists')}}</a>
			<a href="{{url('/send-email')}}" class="btn btn-default">{{trans('app.send')}} e-mail</a>
			<a href="{{url('/settings')}}" class="btn btn-default">{{trans('app.settings')}}</a>
		</div>
	</div>
	<div class="col-md-9">
		<h1>{{trans('subscribers.title')}}</h1>
		<a href="{{ url('/subscribers/create') }}" class="btn btn-default pull-right">{{trans('subscribers.add')}}</a>
		<table class="table table-bordered">
			<tbody>
				@foreach ($list as $l)
  					<tr>
  						<td>
  							{{$l['first_name']}}
  							&nbsp;
  							{{$l['last_name']}}
  						</td>
  						<td>
  							{{$l['email']}}
  						</td>
  						<td>
							<form action="{{ url('/subscribers',$l['id'])}}" method="post">
  								<input type="hidden" name="_method" value="delete">
  								<input type="submit" value="{{trans('subscribers.delete')}}">
  								{{ csrf_field() }}
							</form>
  						</td>
  						<td>
  							<form action="{{ url('/subscribers/'.$l['id'].'/edit')}}" method="get">
  								<input type="submit" value="{{trans('subscribers.edit')}}">
  								{{ csrf_field() }}
							</form>
  						</td>
  					</tr>
				@endforeach
			</tbody>
			<thead>
				<tr>
					<td>{{trans('subscribers.name')}}</td>
					<td>E-mail</td>
					<td></td>
					<td></td>
				</tr>
			</thead>	
		</table>
	</div>
 </div>
@endsection