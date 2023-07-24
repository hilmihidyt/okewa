@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card text-dark border-0 bg-white">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="waTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Short URL</th>
                                    <th>Visits</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="module">
    $(document).ready(function () {
        $('#waTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url()->current() }}',
            columns: [
                { 
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    orderable: false, 
                    searchable: false,
                    width: '5%'
                },
                { 
                    data: 'phone',
                    name: 'phone',
                    orderable: true,
                    searchable: true,
                    width: '25%'
                },
                { 
                    data: 'message', 
                    name: 'message',
                    orderable: true,
                    searchable: true,
                    width: '30%'
                },
                {
                    data: 'short_url', 
                    name: 'short_url',
                    orderable: true,
                    searchable: true,
                    width: '20%'
                },
                {
                    data: 'visits', 
                    name: 'visits',
                    orderable: true,
                    searchable: true,
                    width: '10%'
                },
                { 
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false,
                    width: '10%'
                }
            ]
        }); 
    
        $("#waTable").on("click", "#delete-confirm", function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).data("id");
                    var route = "{{ route('chat-link.destroy', ':id') }}";
                    route = route.replace(':id', id);
    
                    $.ajax({
                        url: route,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (data) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            $('#waTable').DataTable().ajax.reload();
                        },
                        error: function (data) {
                            Swal.fire(
                                'Error!',
                                data.responseJSON.message,
                                'error'
                            );
                        }
                    });
                }
            });
        });
     });
</script>
@endpush