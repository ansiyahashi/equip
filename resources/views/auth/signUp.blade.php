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
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="" style="width:auto">
                        </div>
                        <h1 class="mb-3 text-18"></h1>
                        <form action="{{route('create_service_provider')}}" method="POST">
                            @csrf
                            <div class="card-body row">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputtext11"
                                                class="ul-form__label fs-16">{{ __('Name') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="name"
                                                name="name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail12"
                                                class="ul-form__label fs-16">{{ __('Email') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="email" name="email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="custom-separator"></div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Password') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="password" class="form-control" id="password" name="password"
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
                                     
                                </div>

                                <div class="col-md-6">
                                     


                                    

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputcity"
                                                class="ul-form__label fs-16">{{ __('City') }}:</label><span
                                                class="text-danger">*</span>
                                            <div class="input-right-icon">
                                                <input type="text" class="form-control" id="city"
                                                    name="city" required>
                                            </div>
                                        </div>
                                        

                                        <div class="form-group col-md-4">
                                            <label for="inputEmail15"
                                                class="ul-form__label fs-16">{{ __('State') }}:</label><span
                                                class="text-danger">*</span>
                                            <div class="input-right-icon">
                                                <input type="text" class="form-control" id="inputEmail15"
                                                    name="state" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Identification No') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="id_no"
                                                name="id_no" required>
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
                                        <div class="form-group col-md-4">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('ZipCode') }}:</label>
                                            <input type="text" class="form-control" id="inputtext14"
                                                name="zipcode">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputtext14"
                                                class="ul-form__label fs-16">{{ __('Country') }}:</label><span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" id="inputtext14"
                                                name="country" required>
                                        </div>

                                    </div>
                                    <div class="custom-separator"></div>
  
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="mc-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" class="btn  btn-primary m-1" style="border-radius: 0px !important;
                                            border-width: thick;">Register</button>
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
