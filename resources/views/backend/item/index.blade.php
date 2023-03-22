@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection

@section('main-content')
    <div class="breadcrumb">
        <h1>{{ __('Items') }}</h1>

    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">


                <div class="card-header text-right bg-transparent">
                    <a type="button"  href="{{ route('item.create')}}" class="btn btn-primary btn-md m-1"><i
                            class="i-Add-User text-white mr-2"></i> {{ __('Create Item') }}</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="item_datatable" class="display table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('Id') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Name in Arabic') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Service Provider') }}</th>
                                    <th>{{ __('Location') }}</th>
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
            $('#item_datatable').DataTable({
                processing: true,
                serverSide: true,
                type: "POST",
                ajax: "{{ route('item.index') }}",
                columns: [
                    {
                        'render': function() {
                            return i++;
                        }
                    },
                    {
                        data: 'image',
                        name: 'image'
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
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'service_provider_id',
                        name: 'service_provider_id'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ]
            });


        });

          // Delete Item
          function del_cat(id) {
            var url = 'item';
            remove(id, url);
        }
    </script>
  
@endsection
