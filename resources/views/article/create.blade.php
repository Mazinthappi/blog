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
    <h5 class="card-title">Add Article</h5>

    <form method="post" action="{{route('article.create')}}" enctype="multipart/form-data">
      @csrf
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control">
        </div>
      </div>

      <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="description" style="height: 100px"></textarea>
        </div>
      </div>

      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
        <div class="col-sm-10">
          <input class="form-control" name="image" type="file" id="formFile">
        </div>
      </div>



      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
          <select class="form-select" name="category_id" aria-label="Default select example">
            <option value="">Select</option>
            @foreach ($categories as $category)
            <option
              value="{{ $category->id }}"
              @if (isset($selectedCategoryId) && $selectedCategoryId==$category->id) selected @endif>
              {{ $category->name }}
            </option>
            @endforeach
          </select>

        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Tags</label>
        <div class="col-sm-10">
          <select class="form-select" name="tag_id" aria-label="Default select example">
            <option value="">Select</option>
            @foreach ($tags as $tag)
            <option
              value="{{ $tag->id }}"
              @if (isset($selectedCategoryId) && $selectedCategoryId==$tag->id) selected @endif>
              {{ $tag->name }}
            </option>
            @endforeach
          </select>

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