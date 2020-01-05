@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Create new role</div>
        <div class="panel-body">
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input. <br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form action="{{ url('admin/roles')}}" role="form" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
              <label for="display_name" class="col-md-4 control-label">Display Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="display_name" id="display_name" value="{{ old('display_name') }}" required autofocus>
                @if ($errors->has('display_name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('display_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
              <label for="description" class="col-md-4 control-label">Description</label>
              <div class="col-md-6">
                <textarea name="description" id="descriptioni" cols="50" rows="4" class="form-control">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                  <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
              <label for="permissions" class="col-md-4 control-label">Permissions</label>
              <div class="col-md-6">
                @foreach ($permissions as $key => $permission)
                  <input type="checkbox" value="{{ $key }}" name="permissions[]">{{ $permission }} <br>
                @endforeach
                @if ($errors->has('permissions'))
                  <span class="help-block">
                    <strong>{{ $errors->first('permissions') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url('admin/roles') }}" class="btn btn-link">Cancel</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection