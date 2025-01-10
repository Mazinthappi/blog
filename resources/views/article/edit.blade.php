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
    <h5 class="card-title">Edit Article</h5>

    <form action="{{route('article.update',encrypt($article->id))}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control" value="{{$article->name}}">
        </div>
      </div>
      <!-- <div>
        <input type="hidden" name="id">
      </div> -->

      <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="description" style="height: 100px">{{$article->description}}</textarea>

        </div>
      </div>

      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
        <div class="col-sm-10">
          <input class="form-control" name="image" type="file" id="formFile" value="{{$article->image}}">
        </div>
      </div>

      
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
          <select class="form-select" name="category_id" aria-label="Default select example">
            <!-- Preselect the current article's category -->
            <option value="{{ $article->category->id }}" selected>{{ $article->category->name }}</option>

            <!-- Loop through other categories -->
            @foreach ($categories as $category)
            @if ($category->id !== $article->category->id)
            <option
              value="{{ $category->id }}"
              @if (isset($selectedCategoryId) && $selectedCategoryId==$category->id) selected @endif>
              {{ $category->name }}
            </option>
            @endif
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Tags</label>
        <div class="col-sm-10">
          <select class="form-select" name="tag_id" aria-label="Default select example">
            <!-- Preselect the current article's category -->
            <option value="{{ $article->tag->id }}" selected>{{ $article->tag->name }}</option>

            <!-- Loop through other categories -->
            @foreach ($tags as $tag)
            @if ($tag->id !== $article->tag->id)
            <option
              value="{{ $tag->id }}"
              @if (isset($selectedTagId) && $selectedTagId==$tag->id) selected @endif>
              {{ $tag->name }}
            </option>
            @endif
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