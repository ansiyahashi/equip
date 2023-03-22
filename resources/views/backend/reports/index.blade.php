@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection

@section('main-content')
    <div class="breadcrumb">
        <h1>{{ __('Report') }}</h1>

    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
 
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="item_datatable" class="display table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('Id') }}</th>
                                    <th>{{ __('Assets') }}</th>
                                    <th>{{ __('Price') }}</th>
                                   
                                     
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
                ajax: "{{ route('report.index') }}",
                columns: [
                    {
                        'render': function() {
                            return i++;
                        }
                    },
                    {
                        data: 'item_id',
                        name: 'item_id'
                    },
                    {
                        data: 'price',
                        name: 'price'
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
