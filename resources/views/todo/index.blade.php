@extends('layout.dashboard')

@section('content')
@include('layout.partials.message')
<div>
    <h1 style="color:grey">Search</h1>
    <form action="{{ route('todo.search')}}" method="GET">
        <div class="row">

   <div class="col-md-6">
        <input type="text" name="searchbycombo" value="{{ $request ? $request->get('searchbycombo') : ''}}"  class="form-control" style="width: 100%" placeholder="Enter to search">
        </div>

   <div class="col-md-2">
            <label for="priority">Priority:</label>
            <select name="priority">
                <option></option>
                @for ($i=1; $i <= 10; $i++)
                <option value="{{$i}}" {!! $request->get('priority') == $i ? 'selected' : '' !!}>{{$i}}</option>
                @endfor
            </select>
        </div>

   <div class="col-md-4">
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search "></span> Search</button>
    </div></div>
        </form>
    @foreach ($todos as $todo)  
        <ul class="list-group">
            <form action="{{ route('todo.destroy', $todo->id)}}" method="post">   
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger pull-right btn-sm RbtnMargin "><span class="glyphicon glyphicon-trash"></span> Delete</button>
            </form>
            <a href ="{{ route('todo.edit', $todo->id)}}" class="btn btn-primary pull-right btn-sm RbtnMargin"><span class="glyphicon glyphicon-edit"></span> Edit</a>
            @if($todo->status == 'completed') 
                <h4 id="data"><del>Title:{{$todo->title}}<br>
                Description:{{$todo->description}}</del></h4>
                <input type="checkbox" id="checkbox"  onclick="window.location ='{{ route('todo.normal', $todo->id)}}'" />Not Completed Todo
            @else
                <h4>Title:{{$todo->title}}<br>
                    Description:{{$todo->description}}</h4>
                <input type="checkbox" id="checkbox"  onclick="window.location ='{{ route('todo.cancel', $todo->id)}}'" />Completed Todo
            @endif    
        </ul>
    @endforeach
</div>
@endsection