@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection

@section('main-content')
    <div class="breadcrumb">
        <h1>{{ __('Create Item') }}</h1>

    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <form id="item_form" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputtext11" class="ul-form__label">{{ __('Name') }}:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $item->name ?? '' }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail12" class="ul-form__label">{{ __('Name in Arabic') }}:</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar"
                                    value="{{ $item->name_ar ?? '' }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputtext11" class="ul-form__label">{{ __('Product Model Number') }}:</label>
                                <input type="text" class="form-control" id="model_no" name="model_no"
                                    value="{{ $item->model_no ?? '' }}">
                            </div>
                        </div>



                        <div class="custom-separator"></div>

                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label for="inputtext14" class="ul-form__label">{{ __('Price') }}:</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ $item->price ?? '' }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail15" class="ul-form__label">{{ __('Hour') }}:</label>
                                <div class="input-right-icon">
                                    <input type="text" class="form-control" id="hour" name="hour"
                                        value="{{ $item->hour ?? '' }}">
                                    <input type="hidden" class="form-control" id="item_id" name="item_id"
                                        value="{{ $item->id ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputtext14" class="ul-form__label">{{ __('Day') }}:</label>
                                <input type="text" class="form-control" id="day" name="day"
                                    value="{{ $item->day ?? '' }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail15" class="ul-form__label">{{ __('Week') }}:</label>
                                <div class="input-right-icon">
                                    <input type="text" class="form-control" id="week" name="week"
                                        value="{{ $item->week ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="custom-separator"></div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail12" class="ul-form__label">{{ __('Category') }}:</label>
                                <select class="selectpicker form-control show-tick" data-style="btn-primary-outline"
                                    name="category_id" id="category_id" data-live-search="true" data-width="">
                                    @foreach ($category as $item1)
                                        <option {{ !empty($item) && $item->category_id == $item1->id ? 'selected' : '' }}
                                            value="{{ $item1->id }}">{{ $item1->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputtext14" class="ul-form__label">{{ __('Location') }}:</label>

                                <input type="text" class="form-control" id="location" name="location"
                                    value="{{ $item->location ?? '' }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputEmail15" class="ul-form__label">{{ __('Description') }}:</label>
                                <div class="input-right-icon">
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ $item->description ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail15"
                                    class="ul-form__label">{{ __('Description in Arabic') }}:</label>
                                <div class="input-right-icon">
                                    <input type="text" class="form-control" id="description_ar" name="description_ar"
                                        value="{{ $item->description_ar ?? '' }}">
                                </div>
                            </div>
                           
                        </div>

                        <div class="custom-separator"></div>

                        <div class="form-row">
                           
                            <div class="form-group col-md-3">
                                <label for="inputEmail12" class="ul-form__label">{{ __('Unit') }}:</label>
                                <select class="selectpicker form-control show-tick" data-style="btn-primary-outline"
                                    name="unit" id="unit" data-live-search="true" required data-width="">
                                    
                                        <option value="kg">{{ __('kg') }}</option>
                                        <option value="tone">{{ __('tone')}}</option>
                                   
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputtext14" class="ul-form__label">{{ __('Latitude') }}:</label>
                                <input type="text" class="form-control" id="latitude" name="latitude"
                                    value="{{ $item->latitude ?? '24.774265' }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail15" class="ul-form__label">{{ __('Longitude') }}:</label>
                                <div class="input-right-icon">
                                    <input type="text" class="form-control" id="longitude" name="longitude"
                                        value="{{ $item->longitude ?? '46.738586' }}">
                                </div>
                            </div>
                            <div class="form-group col-md-3" style="margin: auto;margin-bottom: 1%;">
                                <label class="checkbox checkbox-outline-primary">
                                    <input type="checkbox" checked="" name="driver">
                                    <span class="ul-form__label">Driver</span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="custom-separator"></div>

                        <div class="form-row">
                            <div id="googleMap" style="width:100%;height:400px;"></div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" id="saveBtn" class="btn btn-primary">{{ __('Save changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <script>
        $("#item_form").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            console.log(formData);
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('item.store') }}",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    // console.log(response.code);
                    if (response.code == 200) {
                        swal_success();

                    }
                },
                error: function(response) {

                }

            });

        });

        function initMap() {

            var latitude = $("#latitude").val();
            var longitude = $("#longitude").val();


            var mapProp = {
                center: new google.maps.LatLng(latitude, longitude),
                zoom: 4,
            };


            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            map.addListener('click', function(e) {
               
                var lt = e.latLng;
                $("#latitude").val(e.latLng.lat());
                $("#longitude").val(e.latLng.lng());
                var latitude = $("#latitude").val();
                var longitude = $("#longitude").val();
                var marker = new google.maps.Marker({
                    position: e.latLng,
                    title: "Hello World!",
                    visible: true
                });
                marker.setMap(map);
            });





        }
    </script>
    <script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGx5h3BTGfUETTkX-YVnu_akUF--4rf3s&callback=initMap"></script>
@endsection
