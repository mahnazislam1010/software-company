@extends('layouts.backend.app')

@section('title','Slider')

@push('css')
    <style>
    .imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
    background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
    background-color:#fff;
    background-size: cover;
    background-repeat:no-repeat;
    display: inline-block;
    box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
    }
    .btn-primary
    {
    display:block;
    border-radius:0px;
    box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
    margin-top:-5px;
    }
    .imgUp
    {
    margin-bottom:15px;
    }
    .del
    {
    position:absolute;
    top:0px;
    right:15px;
    width:30px;
    height:30px;
    text-align:center;
    line-height:30px;
    background-color:rgba(255,255,255,0.6);
    cursor:pointer;
    }
    .imgAdd
    {
    width:30px;
    height:30px;
    border-radius:50%;
    background-color:#4bd7ef;
    color:#fff;
    box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
    text-align:center;
    line-height:30px;
    margin-top:0px;
    cursor:pointer;
    font-size:15px;
    }
    </style>
@endpush
@section('content')

    <div class="block-header">
        <h2>
            SLIDER
        </h2>
    </div>
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Slider</h2>
                </div>
                <div class="body">
            <form action="{{route('admin.addslider.store')}}" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group form-float">
                    <label for="email_address_2">Title</label>
                    <div class="form-line">
                        <input type="text" class="form-control" name="title" required>
                    </div>
                </div>

                <div class="form-group form-float">
                    <label for="email_address_2">Description</label>
                    <div class="form-line">
                        <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>

                    </div>
                </div>

                <!-- File Upload | Drag & Drop OR With Click & Choose -->
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="email_address_2">Image</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="card">

                            <br><div class="container">
                                <div class="row">
                                    <div class="col-sm-2 imgUp">
                                        <div class="imagePreview"></div>
                                        <label class="btn btn-primary">
                                            Upload<input type="file" name="image" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                    </div><!-- col-2 -->
                                    <i class="fa fa-plus imgAdd"></i>
                                </div><!-- row -->
                            </div><!-- container -->
                        </div>
                    </div>

                    <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
                    <div >
                        {{--                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>--}}
                        <input type="submit" class="btn btn-primary" style="margin-left: 50%; margin-bottom: 40px;" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <!-- #END# Basic Validation -->

    </div>
@endsection

@push('js')
    <script>
    $(".imgAdd").click(function(){
    $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    });
    $(document).on("click", "i.del" , function() {
    $(this).parent().remove();
    });
    $(function() {
    $(document).on("change",".uploadFile", function()
    {
    var uploadFile = $(this);
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

    if (/^image/.test( files[0].type)){ // only image file
    var reader = new FileReader(); // instance of the FileReader
    reader.readAsDataURL(files[0]); // read the local file

    reader.onloadend = function(){ // set image data as background of div
    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
    }
    }

    });
    });
    </script>
@endpush
