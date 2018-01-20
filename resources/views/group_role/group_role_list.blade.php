@extends('layout')

@section('title')
  <h1>Group Role</h1>
@endsection

@section('content')

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Group Role List</h3>
          </div>

          <div class="box-body">
            <button type="button" name="btn_create_group_role" class="btn btn-primary" data-toggle="modal" data-target="#modalCreateGroupRole">Create Group Role</button>

            <br><br>

            @if (session()->has('messageSuccess'))
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> {{ session()->get('message') }}
              </div>
            @endif

            <table class="table table-strip">
              <thead>
                <tr>
                  <td>No.</td>
                  <td>Group Role Name</td>
                  <td>Created At</td>
                  <td>Updated At</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                @if (count($grouproles) == 0)
                  <tr>
                    <td colspan="5" align="center">-- No Data --</td>
                  </tr>
                @else
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($grouproles as $gr)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $gr->group_name }}</td>
                      <td>{{ date('d-m-Y H:i:s', strtotime($gr->created_at)) }}</td>
                      <td>{{ date('d-m-Y H:i:s', strtotime($gr->updated_at)) }}</td>
                      <td>
                        <a href="{{ route('addAccess.show', $gr->id) }}" class="btn btn-primary btn-xs" title="Add Access">
                          <i class="fa fa-universal-access"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </section>

  <div id="modalCreateGroupRole" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create New Group Role</h4>
        </div>
        <div class="modal-body">
          <form class="" action="{{ route('group_role.store') }}" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="group_name">Group Role Name</label>
                <input type="text" class="form-control" id="group_name" name="group_name" required>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
            </div>
        </div>
        <div class="modal-footer">
  				<button type="submit" class="btn btn-primary" id="btn_submit_menu">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>

@endsection
