@extends('layout.dashboard')

@section('content')
@include('layout.partials.message')

<ul class="list-group">
    <li class="list-group-item list-group-item-info">
        <strike><h4 id="data">Title:{{$todos->title}}<br>
                Description:{{$todos->description}}</strike></h4>
    </li>
   <li class="list-group-item list-group-item-info">
        @foreach ($todo as $todom) 
        <h4 id="data">Title:{{$todom->title}}<br>
                Description:{{$todom->description}}
                @endforeach
    </li>
</ul>
 