@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Role Management</div>
          <div class="panel-body">
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
            <table class="table table-striped table-bordered table-condensed">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $key => $role)
                  <tr class="list-users">
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                      <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info">Show</a>
                      <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                      <form action="{{ route('roles.destroy', $role->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" id="delete-task-{{ $role->id }}">
                          <i class="fa fa-trash"></i>Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <a href="{{ route('roles.create') }}" class="btn btn-success">Add New</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection