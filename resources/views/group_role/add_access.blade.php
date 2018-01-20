@extends('layout')

@section('title')
  <h1>Add Access</h1>
@endsection

@section('content')

  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add Application Access</h3>
          </div>

          <div class="box-body">

            <form class="form-horizontal" action="index.html" method="post">
              <div class="form-group">
                <label for="group_name" class="control-label col-sm-2">Group Name : </label>
                <div class="col-sm-10">
                  <input type="hidden" class="form-control" id="" placeholder="" value="{{ $group_role->id }}">
                  <input type="text" name="" class="form-control" value="{{ $group_role->group_name }}" readonly>
                </div>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
