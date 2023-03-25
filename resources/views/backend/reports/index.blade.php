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
                    <form name="frm" method="post"  action= ""> 
                     <select name="Item" id="Item">
                        <option value="">Select Item</option>
                        @foreach($Item as $it)
                        <option value="{{$it->id}}">{{$it->name}}</option>
                        @endforeach
                     </select>
                  
                     <a href="" class="btn btn-xs btn-info pull-right" id="apply">apply</a>
                    </form>
<!-- example -->
<div class="form-group row">
                            <div class="col-md-5">
                                <label for="inputEmail2" class="datepicker ul-form__label fs-16">{{ __('From') }}</label>
                                <input type="text" id="date_from" class="form-control" name="date_filter" />
                            </div>
                            <div class="col-md-5">
                                <label for="inputEmail2" class="datepicker ul-form__label fs-16">{{ __('To') }}</label>
                                <input type="text" id="date_to" class="form-control" name="date_filter" />
                            </div>
                            <div class="col-md-2" style="margin-top: auto;">
                                <button type="button" class="btn btn-primary" id="apply_filter">{{__('Apply')}}</button>
                            </div>
                        </div>

                  
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

//example
$(function() {
                $('input[name="date_filter"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1901,
                    locale: {
                        format: 'YYYY-MM-DD'
                    },
                    maxYear: parseInt(moment().format('YYYY'), 10)
                });
            });



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
                ajax:{
                    url:"{{ route('report.index') }}",

                    data: function(d) {
                                        
                                        $('#apply').click(function() {
                                            d.Item = $('#Item').val();
                                            alert( d.Item);
                                        });
                                        //example
                                        d.date_filter = $('#date_filter').val();
                        $('#apply_filter').click(function() {//alert('hii');
                            d.date_from = $('#date_from').val();
                            d.date_to = $('#date_to').val();
                        });
                                      
                                      }
                     } ,
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

            // $('body').on('change', '.filters', function() {
            //     table.draw();
            // });
            // $('body').on('click', '#apply_filter', function() {
            //     table.draw();
            // });
            // var buttons = new $.fn.dataTable.Buttons(table, {
            //      buttons: [
            //        'copyHtml5',
            //        'excelHtml5',
            //        'csvHtml5',
            //        'pdfHtml5'
            //     ]
            // }).container().appendTo($('#buttons'));
             });

       

          // Delete Item
        //   function del_cat(id) {
        //     var url = 'item';
        //     remove(id, url);
        //}
    </script>
  
@endsection
