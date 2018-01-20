@extends('layout')

@section('title')
	<h1>Setup Application</h1>
@endsection

@section('content')

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">

				<div class="box-header">
					<h3 class="box-title">Application List</h3>
				</div>

				@if (session()->has('message'))
					<script>
						$(document).ready(function () {
							alert('{{ session()->get('message') }}')
						})
					</script>
				@endif

				<div class="box-body">
					<button type="button" name="btn_create_menu" class="btn btn-primary" data-toggle="modal" data-target="#createMenuModal">Create Menu</button>
					<table class="table table-strip">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Menu</th>
								<th>Url</th>
								<th>Icon</th>
								<th>Parent</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@php
								$no = 1;
							@endphp
							@foreach ($menu as $value)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$value->name}}</td>
									<td>{{$value->url}}</td>
									<td><i class="fa {{$value->icon}}"></i>  ({{$value->icon}})</td>
									<td>
										@php
											if ($value->parent_id != 0) {
												$parent_name = \App\Menu::where('id', $value->parent_id)->first();
												echo $parent_name->name;
											} else {
												echo "Root";
											}
										@endphp
									</td>
									<td>
										<form action="{{ route('setup_app.destroy', $value->id) }}" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="_method" value="DELETE" >
											<button type="button" data-toggle="modal" data-target="#createMenuModal" name="button_edit_menu" data-url="{{ route('setup_app.show', $value->id) }}" name="edit_menu" class="btn btn-xs btn-warning">
												<i class="fa fa-pencil"></i> Edit
											</button>
											<button type="submit" name="delete_menu" class="btn btn-xs btn-danger" onClick="confirmDelete()">
												<i class="fa fa-trash"></i> Delete
											</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</section>

<div id="createMenuModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Menu</h4>
      </div>
      <div class="modal-body">
				<form action="{{ route('setup_app.store') }}" method="POST" role="form" id="form_create_menu">
					<div class="box-body">
						<div class="form-group" id="tempat_naro_method_put">
							<label for="menu_name">Name</label>
							<input type="text" class="form-control" name="menu_name" required>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</div>
						<div class="form-group">
							<label for="menu_url">Url</label>
							<input type="text" class="form-control" name="menu_url" required>
						</div>
						<div class="form-group">
							<label for="menu_icon">Icon</label>
							<input type="text" class="form-control" name="menu_icon" required>
						</div>
						<div class="form-group">
							<label for="menu_parent">Parent</label>
							<select name="menu_parent" class="form-control" required>
								<option value="">-- PILIH --</option>
								<option value="0">Root</option>
								@foreach ($menu as $key)
									<option value="{{ $key->id }}">{{ $key->name }}</option>
								@endforeach
							</select>
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

<script type="text/javascript">
	$(document).ready(function() {
		$('[name="button_edit_menu"]').click(function() {
			$('#createMenuModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  $.ajax({
					url: button.data('url'),
					type: 'GET',
					data: {

					},
					success: function(data){

						var url    = '{{ route('setup_app.update', ':id') }}';
						url        = url.replace(':id', data.id);

						$('[name="menu_name"]').val(data.name);
						$('[name="menu_url"]').val(data.url);
						$('[name="menu_icon"]').val(data.icon);
						$('[name="menu_parent"]').val(data.parent_id);
						$('#form_create_menu').attr('action', url);
					}
				})
			  var modal = $(this);
			  modal.find('.modal-title').text('Update Menu');
				$('#btn_submit_menu').text('Update');
				$('#tempat_naro_method_put').append('<input type="hidden" name="_method" value="PUT" />');
			  // modal.find('.modal-body input').val(recipient)
			})
		})
	})
</script>

@endsection
