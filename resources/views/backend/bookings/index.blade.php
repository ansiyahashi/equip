@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection

@section('main-content')
    <div class="breadcrumb">
        <h1>{{ __('All Bookings') }}</h1>

    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
 
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="cat_datatable" class="display table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('Id') }}</th>
                                    <th>{{ __('Item Name') }}</th>
                                    <th>{{ __('Model No') }}</th>
                                    <th>{{ __('Time') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Customer Details') }}</th>
                                    <th>{{ __('Driver') }}</th>
                                    <th>{{ __('Date') }}</th>
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
            $('#cat_datatable').DataTable({
                processing: true,
                serverSide: true,
                type: "POST",
                ajax: "{{ route('booking.index') }}",
                columns: [
                    {
                        'render': function() {
                            return i++;
                        }
                    },
                    {
                         data:'item_id',
                         name:'item_id',
                    }, 
                   
                    {
                        data: 'model'
                         
                    },
                    {
                        data: 'time',
                        name: 'time'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'customer_details'
                        
                    },
                    {
                        data: 'driver',
                        name: 'driver'
                    },
                    {
                        data: 'date'
                        
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ]
            });


        });

        
    </script>
  
@endsection
