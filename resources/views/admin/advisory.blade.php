@extends('layouts.backend.app')

@section('title','Advisory')

@push('css')

@endpush
@section('content')
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Advisory
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th width="15%">Name</th>
                                <th width="15%">Email</th>
                                <th width="30%">Description</th>
                                <th width="25%">Image</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($advisorys as $key=>$advisory)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $advisory->name }}</td>
                                    <td>{{ $advisory->email }}</td>
                                    <td>{{ $advisory->description }}</td>
                                    <td class="center">
                                        <img src="{{ asset('public/storage/advisory/'.$advisory->image) }}" width="50px;" height="50ox;">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" onclick="deleteAdvisory({{$advisory->id}});">
                                            <i class="material-icons">delete</i>
                                        </a>
                                        <form hidden id="delete-advisory-form-{{$advisory->id}}" method="post" action="{{route('admin.advisory.delete',$advisory->id)}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
@endsection

@push('js')
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteAdvisory(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to remove this advisory!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-advisory-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal('Cancelled', 'Your data is safe :)', 'error')
                }
            })
        }
    </script>
@endpush
