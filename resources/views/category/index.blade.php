@extends('layout.dashboard')

@section('content')

@foreach ($category as $cat)  
        <ul class="list-group">
            <li class="list-group-item list-group-item-info">
                <h4>Category:{{$cat->category_name}}</h4>
                @include('layout.partials.message')
                <div class="btn-group">
                    <form action="{{ route('category.destroy', $cat->id)}}" method="post">
                    {{method_field('DELETE')}}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a href ="{{ route('category.edit', $cat->id)}}" class="btn btn-primary">Edit</a>  
                    </form>
                </div>
            </li>
        </ul>
@endforeach
@endsection