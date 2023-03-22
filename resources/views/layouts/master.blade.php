<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="zoom: 95%;" dir="{{app()->getLocale()=='en'?'ltr':'rtl'}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=0.9">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Equip</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
    @yield('before-css')
    {{-- theme css --}}

    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link id="gull-theme" rel="stylesheet" href="{{ asset('assets\fonts\iconsmind\iconsmind.css') }}">
    <link id="gull-theme" rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/perfect-scrollbar.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/bootstrap-select.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    
    


    {{-- page specific css --}}
    @yield('page-css')
</head>






<body class="text-left">
    
    @php
        $layout = session('layout');
    @endphp

    @include('backend.e_uploader')

    @include('layouts.large-vertical-sidebar.master')
    @include('sweetalert::alert')
    <script>
        var cat_img_upload = "{{ route('image_upload') }}";
    </script>
 
    <script>var ImgUrl = "{{ URL::asset('/') }}"+"public/";</script>
    <script src="{{ asset('assets/js/common-bundle-script.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/vendor/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.script.js') }}"></script>
    <script src="{{ asset('assets/js/customScript.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.script.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('assets/js/vendor/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/layout-sidebar-vertical.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/form.validation.script.js') }}"></script> --}}
    
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

    {{-- page specific javascript --}}
    @yield('page-js')

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.large.script.js') }}"></script>
    <script src="https://releases.transloadit.com/uppy/v2.4.1/uppy.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

    @include('sweetalert::alert')

    @yield('bottom-js')
    {{-- <script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/datatables.script.js') }}"></script>
  

</body>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    Dropzone.options.imageUpload = {
        maxFilesize: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        file: 'file'
    };

    function swal_success() {
        swal({
            type: 'success',
            title: 'Success!',
            text: 'Your work has been saved',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-success'
        }).then(function() {
            location.reload();
        });
    }

    function swal_error(message) {
        swal({
            type: 'error',
            title: 'Error!',
            text: message,
            confirmButtonText: 'Dismiss',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-danger'
        })
    }

    function remove(id, url) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function(response) {
                let _url = `${url}/${id}`;
                let _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: _url,
                    type: 'DELETE',
                    data: {
                        _token: _token
                    },
                    success: function(response) {
                        $("#row_" + id).remove();
                        swal(
                            'Deleted!',
                            'Deleted Successfully.',
                            'success'
                        ).then(function() {
                            location.reload();
                        });

                    }
                });

            },
            function(dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        // 'Your imaginary file is safe :)',
                        // 'error'
                    )
                }
            });

    }
    $("div#emdadUploader").on('show.bs.modal', function() {
        select_file();
    });
    $('#select_file').click(function() {
        select_file();
    });
    var current_page;var last_page; var from;
    $('#prev_img').click(function(){
      // select_file();
    });
    function select_file(page=1) {
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{ route('get_uploaded_files') }}?page='+page,
            //page=2
            type: 'GET',
            data: {
                _token: _token
            },
            success: function(response) {
               
                var data = response.data;
                if (data.length > 0) {
                   
                    if(data.current_page==1){
                        $('#prev_img').addClass('d-none');
                    }else{
                         $('#prev_img').removeClass('d-none');
                    }
                    if(data.current_page==data.last_page){
                        $('#next_img').addClass('d-none');
                    }else{
                         $('#next_img').removeClass('d-none');
                    }
                    $("#emd-upload-files").html(null);

                    for (var i = 0; i < data.length; i++) {
                        var thumb = "";
                        var hidden = "";
                        if (data[i].type === "image") {
                            var imgf=show_asset(data[i].file_name);
                            thumb =
                                '<img style="height: 130px;" src="' +
                                imgf +
                                '" class="card-img-top">';
                        } else {
                            thumb = '<i class="la la-file-text"></i>';
                        }
                        var html =
                            '<div  class="col-md-3 emd-file-box-wrap uploaded_images"' +
                            'data-id="' +
                            data[i].id +

                            '"data-name="' +
                            data[i].file_name +
                            '">' +
                            '<div class="emd-file-box">' +
                            '<div class="card mb-4 o-hidden emd-uploader-select" title="' +
                            data[i].file_original_name +
                            "." +
                            data[i].extension +
                            '" data-value="' +
                            data[i].id +
                            '">' +
                            '<div class="o-hidden">' +
                            thumb +
                            "</div>" +
                            '<div class="card-footer">' +
                            '<h6 class="d-flex">' +
                            '<span class="text-truncate title">' +
                            data[i].file_original_name +
                            "</span>" +
                            // '<span class="ext flex-shrink-0">.' +
                            // data[i].extension +
                            // "</span>" +
                            "</h6>" +
                            "<p>" +

                            "</p>" +
                            "</div>" +
                            "</div>" +

                            "</div>";

                         $("#emd-upload-files").append(html);
                    }
                } else {
                    $("#emd-upload-files").html(
                        '<div class="align-items-center d-flex h-100 justify-content-center w-100 nav-tabs"><div class="text-center"><h3>No files found</h3></div></div>'
                    );
                }
            }
        });
    }
    
   
  
    function show_asset(d){
        return ImgUrl+''+d;
    }
 
</script>

</html>
