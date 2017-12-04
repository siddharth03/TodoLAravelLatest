@extends('layout.dashboard')

@section('content')

@include('layout.partials.message')
<script>
    $("")
</script>
<form name="add_contact" method="post" action="#">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="Contact">Contact:</label>
        <input type="text" name="contact_no" class="form-control" placeholder="Enter contact number" style="width:40%;">
        <span class="glyphicon glyphicon-plus pull-right" id="add_contact" style="margin-top:-2%;margin-right: 57%;color: blue;">    
        </span>
    </div>
</form>

@endsection
