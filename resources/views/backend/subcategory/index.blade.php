@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection

@section('main-content')
    <div class="breadcrumb">
        <h1>{{ __('Sub Category') }}</h1>

    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">


                <div class="card-header text-right bg-transparent">
                    <button type="button" data-toggle="modal" data-target=".sub_category_modal" class="btn btn-primary btn-md m-1"><i
                            class="i-Add-User text-white mr-2"></i> {{ __('Add SubCategory') }}</button>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="subcat_datatable" class="display table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('Id') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Name in Arabic') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Description in Arabic') }}</th>
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
    @include('backend.modals.sub_category')
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
            $('#subcat_datatable').DataTable({
                processing: true,
                serverSide: true,
                type: "POST",
                ajax: "{{ route('subcategory.index') }}",
                columns: [
                    {
                        'render': function() {
                            return i++;
                        }
                    },
                   
                   
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'name_ar',
                        name: 'name_ar'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'description_ar',
                        name: 'description_ar'
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
           $('#subcategory_modal').modal('show');
           $.get("{{ route('subcategory.index') }}" + '/' + id + '/edit', function(data) {
                $("#saveBtn").val("Update");
                $("#title").val("Edit Sub Category");
                $("#subcat_id").val(data.id);
                $("#name").val(data.name);
                 $("#name_ar").val(data.name_ar);
                 $("#description_ar").val(data.description_ar);
                 $("#description").val(data.description);
                
            });
        }
    </script>
  
@endsection
