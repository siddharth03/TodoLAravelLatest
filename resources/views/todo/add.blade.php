@extends('layout.dashboard')

@section('content')

@include('layout.partials.message')

<form name='form' action="{{ $todo->id ? route('todo.update', $todo->id) : route('todo.store')}}" method='post'>
    {{ method_field($todo->id ? 'PATCH' : 'POST') }}
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ $todo->title }}" placeholder="Enter title">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" name="description" class="form-control" id="description" value="{{ $todo->description }}" placeholder="Enter description here">
    </div>
    <div class="form-group">
        <label for="reference">Reference:</label>
        <input type="text" name="reference" class="form-control" id="reference" value="{{ $todo->reference }}" placeholder="Enter reference here">
    </div>
    <div class="form-group">
        <label for="priority">Priority:</label>
        <select name="priority" id="priority">
           @for ($i=1; $i<=10; $i++) 
                <option value="{{$i}}" {{ ($todo->priority == $i ? 'selected="selected"' : '') }}>{{$i}} </option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <label for="category">Category:</label>  
        @php ($todoCategoryIds = $todo->categories->pluck('category_name', 'id'))
        <select name="category[]" class="form-control" id="category" multiple>
            @foreach($category as $id => $category_name)
                <option value="{{$id}}" {{ $todoCategoryIds->has($id) ? 'selected' : ''}} >{{ $category_name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <a href="{{ action('TodoController@index') }}"> <button type="button" class="btn btn-success">View All Todo</button> </a>
</form>
@endsection