@extends('layouts.backend.app')

@section('title','Module')

@push('css')

@endpush
@section('content')
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Module
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th width="10%">SL</th>
                                <th width="30%">Name</th>
                                <th width="30%">Image</th>
                                <th width="30%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modules as $key=>$module)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $module->name }}</td>
                                    <td class="center">
                                        <img src="{{ asset('public/storage/module/'.$module->image) }}" width="50px;" height="50ox;">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" onclick="deleteModule({{$module->id}});">
                                        <i class="material-icons">delete</i>
                                        </a>
                                        <form hidden id="delete-module-form-{{$module->id}}" method="post" action="{{route('admin.module.delete',$module->id)}}">
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
        function deleteModule(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to remove this module!",
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
                    document.getElementById('delete-module-form-'+id).submit();
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
