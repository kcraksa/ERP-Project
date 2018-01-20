<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
	<link rel="stylesheet" href="{!! asset('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">
	<link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
</head>
<body>

<table id="applicationList" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Application Name</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
</table>

<script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
<script src="{!! asset('bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#applicationList').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{ route('api.setupapps') }}',
			columns: [
				{data: 'id', name: 'ID'},
				{data: 'appName', name: 'Application Name'},
				{data: 'isActive', name: 'Status'},
			]
		});
	})
</script>
</body>
</html>