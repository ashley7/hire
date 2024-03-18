@section('styles')

   <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/buttons.dataTables.min.css') }}"> 

 @endsection



 @push('scripts')
	<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('js/jszip.min.js') }}"></script>
	<script src="{{ asset('js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('js/vfs_fonts.js') }}"></script>
	<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('js/buttons.print.min.js') }}"></script>   
	<script>
 

        $(document).ready( function() {
            $('#table_unsorted').dataTable({
                "aaSorting": [],
                pageLength: 1000,
                dom: 'Bfrtip',
                buttons: ['excel','pdf','csv' ]
            });
        });

     

	</script>
@endpush

