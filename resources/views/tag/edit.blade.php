@extends('template.layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit Tag</h5>

    <form action="{{route('tag.update',encrypt($tags->id))}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control" value="{{$tags->name}}">
        </div>
      </div>
      <!-- <div>
        <input type="hidden" name="id">
      </div> -->

      <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="description" style="height: 100px">{{$tags->description}}</textarea>

        </div>
      </div>

      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
        <div class="col-sm-10">
          <input class="form-control" name="image" type="file" id="formFile" value="{{$tags->image}}">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Submit Button</label>
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Submit </button>
        </div>
      </div>

    </form>
  </div>
</div>

@endsection