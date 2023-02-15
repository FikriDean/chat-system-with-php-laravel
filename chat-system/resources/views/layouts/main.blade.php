<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Chat</title>

				{{-- Bootstrap CDN --}}
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
								integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

				<!-- DataTables -->
				<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
				<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

				<script src="https://kit.fontawesome.com/91ba5df506.js" crossorigin="anonymous"></script>

				{{-- Own CSS --}}
				<link rel="stylesheet" href="{{ asset('/css/style.css') }}">

				@livewireStyles
</head>

<body>
				@yield('content')

				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
								integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
				</script>

				<script>
								document.addEventListener('trix-file-accept', function(e) {
												e.preventDefault();
								})
				</script>

				{{-- Bootstrap CDN --}}
				<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

				<!-- jQuery -->
				<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
				<!-- jQuery UI 1.11.4 -->
				<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>


				<!-- DataTables  & Plugins -->
				<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
				<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
				<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
				<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
				<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
				<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

				<script>
								$(function() {
												$("#chatlist").DataTable({
																"responsive": true,
																"lengthChange": false,
																"autoWidth": true,
																"paging": false,
																"info": false,
																"scrollY": "70vh",
																"scrollCollapse": true,
																"scroller": {
																				displayBuffer: 40,
																				loadingIndicator: true,
																				serverWait: 500,
																},
																// "buttons": ["copy", "csv", "excel", "pdf", "print"]
												}).buttons().container().appendTo('.custom-datatable_wrapper .col-md-6:eq(0)');

												$("#newchat").DataTable({
																"searching": true,
																"filter": true,
																"responsive": true,
																"lengthChange": false,
																"autoWidth": true,
																"paging": false,
																"info": false,
																"scrollY": "70vh",
																"scrollCollapse": true,
																"scroller": {
																				displayBuffer: 40,
																				loadingIndicator: true,
																				serverWait: 500
																},
												}).buttons().container().appendTo('.custom-datatable_wrapper .col-md-6:eq(0)');
								});
				</script>

				@livewireScripts

				@yield('custom_scripts')

</body>

</html>
