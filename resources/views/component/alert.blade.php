@php $message = session('message'); @endphp
@if(session('message'))
	<script>
		swal("successful","{{ $message }}","success");
	</script>
@endif 