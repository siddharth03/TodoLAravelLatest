@extends('layout.dashboard')



@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Reference</th>
                <th>Priority</th>
                <th>Status</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
    
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'reference', name: 'reference' },
            { data: 'priority', name: 'priority' },
            { data: 'status', name: 'status' }
        ]
    });
});
</script>
@endpush