@extends('template.layout')
@section('content')

@if(session('success'))
<script>
   Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
    title: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 40000,
    customClass: {
        popup: 'custom-swal-popup',
        title: 'custom-swal-title',
    }
});
</script>
@endif
<h1>hai</h1>

@endsection