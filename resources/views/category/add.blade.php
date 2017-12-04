@extends('layout.dashboard')

@section('content')

@include('layout.partials.message')

<form name="category" action="{{ $category->id ? route('category.update', $category->id) : route('category.store')}}" method='post'>
      {{ method_field($category->id ? 'PATCH' : 'POST') }}
    {{csrf_field()}}
<div class="form-group">
        <label for="category_name">Category Name:</label>
        <input type="text" name="category_name" class="form-control" id="category_name" value="{{$category->category_name}}" placeholder="Enter category">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="{{ action('CategoryController@index') }}"> <button type="button" class="btn btn-success">View All Category</button> </a>
</div>
</form>
@endsection