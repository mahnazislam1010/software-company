@extends('layouts.backend.app')

@section('title','SEO')

@push('css')

@endpush
@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SEO
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route('admin.seo.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <label for="email_address">Page name</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">pages</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="pagename" value="{{ isset($info->pagename)?$info->pagename:'' }}" class="form-control mobile-phone-number" placeholder="Enter page name">
                                </div>
                            </div>
                            <label for="email_address">Content</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="content" cols="30" rows="5" class="form-control no-resize" required>{{ isset($info->content)?$info->content:'' }}</textarea>
                                </div>
                            </div>
                            <label for="email_address">Tags</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="tags" cols="30" rows="5" class="form-control no-resize" required>{{ isset($info->tags)?$info->tags:'' }}</textarea>
                                </div>
                            </div>



                            <br>
                            <input type="submit" class="btn btn-primary" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->

    </div>
    @endsection

    @push('js')

    @endpush
