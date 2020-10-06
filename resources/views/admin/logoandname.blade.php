@extends('layouts.backend.app')

@section('title','Logo and Name')

@push('css')

@endpush
@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>Logo and Name</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Logo and Name
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <h2 class="card-inside-title">Logo Name</h2>
                        <form action="{{route('admin.logo.name.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" value="{{ isset($info->name)?$info->name:'' }}" class="form-control" placeholder="Name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img src="{{isset($info->logo)?asset('public/storage/logo/'.$info->logo):''}}">
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="logo" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <input type="submit" class="btn btn-primary" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Input -->
    </div>

@endsection

@push('js')


@endpush
