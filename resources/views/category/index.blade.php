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

@if(session('error'))
<script>
   Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'error',
    title: "{{ session('error') }}",  // Display error message
    showConfirmButton: false,
    timer: 40000,
    customClass: {
        popup: 'custom-swal-popup',
        title: 'custom-swal-title',
    }
});
</script>
@endif


<div class="card">
    <div class="card-body ">
        <h5 class="card-title">Categories</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">SI NO</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">NAME</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories as $key => $category)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td><img src="{{ asset('/images/'.$category->image) }}" alt="profile Pic" height="100" width="100"></td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{route('category.editPage', encrypt($category->id))}}" class="ri-edit-2-fill"></a>
                            <a href="{{route('category.delete',encrypt($category->id))}}" class="ri-delete-bin-6-line"></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-5 ">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex flex-row justify-content-center">
    {{$categories->links()}}
</div>

@endsection
