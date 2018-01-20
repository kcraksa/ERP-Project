<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{!! asset('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('bower_components/font-awesome/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('bower_components/Ionicons/css/ionicons.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('dist/css/AdminLTE.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('dist/css/skins/_all-skins.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('buttons/css/buttons.dataTables.min.css') !!}">

    <script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
  	<script src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('buttons/js/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('buttons/js/buttons.print.min.js') !!}"></script>
  	<script src="{!! asset('vendor/datatables/buttons.server-side.js') !!}"></script>
  	<script src="{!! asset('js/additional_function.js') !!}"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 150px;">

          @if (session()->has('messageError'))
            <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Gagal !.</strong> Username atau Password Salah.
            </div>
          @endif

          <div class="panel panel-default">
            <div class="panel-heading">
              Login
            </div>
            <div class="panel-body">

              <form class="" action="{{ route('login.attempt') }}" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </div>
                </div>

                <div class="form-group" style="text-align: right">
                  <button type="submit" name="submit-login" class="btn btn-primary">
                    <i class="fa fa-login"></i> Login
                  </button>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
