@extends('layout')

@section('content')
	<section class="content">
		<div class="row">

			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Create an Application</h3>
					</div>

					<form action="{{ url('/save_menu') }}" role="form">
						<div class="box-body">
							<div class="form-group">
								<label for="appName">Application Name</label>
								<input type="text" class="form-control" name="appName" id="appName">
							</div>
							<div class="form-group">
								<label for="isActive">Status</label>
								<select name="isActive" id="isActive" class="form-control">
									<option value=""></option>
									@foreach ($menu as $key)
										<option value="{{ $key->id }}">{{ $key->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="box-footer" style="text-align: right;">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</section>
@endsection
