@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection

@section('main-content')
    <div class="breadcrumb">
        <h1>{{ __('Banners') }}</h1>

    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">


                <div class="card-header text-right bg-transparent">
                    <button type="button" data-toggle="modal" data-target=".banner_modal" class="btn btn-primary btn-md m-1"><i
                            class="i-Add-User text-white mr-2"></i> {{ __('Add Banner') }}</button>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="cat_datatable" class="display table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('Id') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Type') }}</th>
                                     
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('backend.modals.banner')
@endsection

@section('bottom-js')
<script>
        $('document').ready(function() { 
            // csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var i = 1;
            //Datatable
            $('#cat_datatable').DataTable({
                processing: true,
                serverSide: true,
                type: "POST",
                ajax: "{{ route('banner.index') }}",
                columns: [
                    {
                        'render': function() {
                            return i++;
                        }
                    },
                    {
                         data:'image',
                         name:'image',
                    }, 
                   
                    {
                        data: 'type',
                        name: 'type'
                    },
                   
                    
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ]
            });


        });

        function edit_modal(id)
        {
           $('#banner_modal').modal('show');
           $.get("{{ route('banner.index') }}" + '/' + id + '/edit', function(data) {
                $("#saveBtn").val("Update");
                $("#title").val("Edit Banner");
                $("#banner_id").val(data.id);
                 
                
            });
        }
    </script>
  
@endsection
