@extends('layouts.app')


@section('content')
<div class="row">
	<div class="col-md-2">
		@include('subscribers.menu')
	</div>
	<div class="col-md-9">
		<h1>Subscribers</h1>
		<a href="{{ url('/subscribers/create') }}" class="btn btn-default pull-right">Add new</a>
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
  								<input type="submit" value="Delete">
  								{{ csrf_field() }}
							</form>
  						</td>
  						<td>
  							<form action="{{ url('/subscribers',$l['id'])}}" method="post">
  								<input type="hidden" name="_method" value="put">
  								<input type="submit" value="Update">
  								{{ csrf_field() }}
							</form>
  						</td>
  					</tr>
				@endforeach
			</tbody>
			<thead>
				<tr>
					<td>Name</td>
					<td>E-mail</td>
					<td></td>
					<td></td>
				</tr>
			</thead>	
		</table>
	</div>
 </div>
@endsection