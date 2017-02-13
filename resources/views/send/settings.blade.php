@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">{{trans('send.settings')}}</div>
    <div class="panel-body row">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/setsettings') }}">
        {{csrf_field()}}
        <div class="col-md-3 col-md-push-4">
          <div class="input-group">
            <label for="type"  class="input-group-addon">{{trans('send.type')}}</label>
            <select name="type" id="type" class="form-control">
              <option value="PHP">PHP</option>
              <option value="SMTP">SMTP</option>
              <option value="Mandrill">Mandrill</option>
            </select>
          </div>
        </div>
        <div class="col-md-2  col-md-push-4">
          <button class="btn btn-default">OK</button>  
        </div>
         
      </form>
    </div>
  </div>
</div>
@endsection
