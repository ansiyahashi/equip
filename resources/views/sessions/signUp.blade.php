<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supplier's House</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">
</head>


<body>
  
     <div class="auth-layout-wrap" style="">
        <div class="card o-hidden" style="width: 80%">
            <div class="row">
                <div class="col-md-12">

                    <div class="p-4">
                        <div class="auth-logo text-center mb-4">
                            <img src="{{ asset('assets/images/logoe.jpg') }}" alt="" style="width:auto">
                        </div>
                        <h1 class="mb-3 text-18"></h1>
                        <form action="{{route('store_shop')}}" method="POST">
                            @csrf
                            <div class="card-body row">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputtext11"
                                                class="ul-form__label fs-16">{{ __('Name') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="inputtext11"
                                                name="seller_name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail12"
                                                class="ul-form__label fs-16">{{ __('Email') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="inputEmail12" name="email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="custom-separator"></div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Password') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="password" class="form-control" id="inputtext14" name="password"
                                                required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputpassword1"
                                                class="ul-form__label fs-16">{{ __('Confirm Password') }}:</label><span
                                                class="text-danger">*</span>
                                            <div class="input-right-icon">
                                                <input type="password" class="form-control" id="inputpassword1"
                                                    name="confirm-password" required>
                                            </div>
                                        </div>

                                    </div>
                                     <div class="custom-separator"></div>
                                    {{-- <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Profile Image') }}:</label><span
                                                class="text-danger">*</span>
                                            <div class="input-group mb-3" data-toggle="emdadUploader" data-type="image">

                                                <div class="custom-file">
                                                    <input class="custom-file-input" data-type="single" name="avatar"
                                                        id="inputGroupFile03" aria-describedby="inputGroupFileAddon01"
                                                        required>
                                                    <label class="custom-file-label" for="inputGroupFile03">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <div class="selected_files_preview d-flex" for="inputGroupFile03">

                                            </div>
                                            <div class="" id="file_holder"></div>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputtext11" placeholder="Enter Shop Name"
                                                class="ul-form__label fs-16">{{ __('Shop Name') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="inputtext11" name="name"
                                                required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail12" aria-placeholder="Enter Shop Phone"
                                                class="ul-form__label fs-16">{{ __('Shop Phone') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="inputEmail12" name="phone"
                                                required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Shop Category') }}:</label><span
                                                class="text-danger">*</span>
                                            <select class="selectpicker form-control show-tick"
                                                data-style="btn-primary-outline" name="category"
                                                data-live-search="true" aria-label="Select Shop Category" required>
                                                <option value="0" selected>Select Category</option>
                                                @foreach ($business_categories as $category)
                                                    <option name="category_id" value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Cr No') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="inputtext14"
                                                name="cr_no" required>
                                        </div>

                                    </div>


                                    <div class="custom-separator"></div>


                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputcity"
                                                class="ul-form__label fs-16">{{ __('City') }}:</label><span
                                                class="text-danger">*</span>
                                            <div class="input-right-icon">
                                                <input type="text" class="form-control" id="inputcity"
                                                    name="city" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Country') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="inputtext14"
                                                name="country" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputEmail15"
                                                class="ul-form__label fs-16">{{ __('State') }}:</label><span
                                                class="text-danger">*</span>
                                            <div class="input-right-icon">
                                                <input type="text" class="form-control" id="inputEmail15"
                                                    name="state" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Vat No') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="inputtext14"
                                                name="vat_no" required>
                                        </div>
                                    </div>


                                    <div class="custom-separator"></div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Landmark') }}:</label>
                                            <input type="text" class="form-control" id="inputtext14"
                                                name="landmark">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('ZipCode') }}:</label>
                                            <input type="text" class="form-control" id="inputtext14"
                                                name="zipcode">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="inputtext11" class="ul-form__label fs-16">Minimun Order
                                                Amount:</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="inputtext11"
                                                name="moq" required>
                                        </div>

                                    </div>
                                    <div class="custom-separator"></div>

                                    {{-- <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="inputEmail2" class="ul-form__label fs-16">Shop
                                                Banner:</label><span class="text-danger">*</span>
                                            <div class="input-group mb-3" data-toggle="emdadUploader"
                                                data-type="image">
                                                {{-- <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroupFileAddon11">Upload</span>
                                                </div> --}}
                                                {{-- <div class="custom-file">
                                                    <input class="custom-file-input" data-type="multiple"
                                                        name="slider[]" id="inputGroupFile11"
                                                        aria-describedby="inputGroupFile11" required>
                                                    <label class="custom-file-label" for="inputGroupFile11">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <div class="selected_files_preview d-flex" for="inputGroupFile11">

                                            </div>
                                            <div class="" id="file_holder"></div>
                                        </div> --}}
                                        {{-- <div class="form-group col-md-4">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Logo') }}:</label><span
                                                class="text-danger">*</span>
                                            <div class="input-group mb-3" data-toggle="emdadUploader"
                                                data-type="image">

                                                <div class="custom-file">
                                                    <input class="custom-file-input" data-type="single"
                                                        name="logo" id="inputGroupFile01"
                                                        aria-describedby="inputGroupFileAddon01" required>
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <div class="selected_files_preview d-flex" for="inputGroupFile01">

                                            </div>
                                            <div class="" id="file_holder"></div>
                                        </div> --}}
                                        {{-- <div class="form-group col-md-4">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Cover Image') }}:</label><span
                                                class="text-danger">*</span>
                                            <div class="input-group mb-3" data-toggle="emdadUploader"
                                                data-type="image">

                                                <div class="custom-file">
                                                    <input class="custom-file-input" data-type="single"
                                                        name="banner_img" id="inputGroupFile02"
                                                        aria-describedby="inputGroupFileAddon01" required>
                                                    <label class="custom-file-label" for="inputGroupFile02">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <div class="selected_files_preview d-flex" for="inputGroupFile02">

                                            </div>
                                            <div class="" id="file_holder"></div>
                                        </div> --}}

                                    {{-- </div> --}} 
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="mc-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" class="btn  btn-primary m-1" style="border-radius: 0px !important;
                                            border-width: thick;">Register new Supplier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>

                    </div>

                    <div class="col-md-2">

                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <script src="{{ asset('assets/js/common-bundle-script.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
