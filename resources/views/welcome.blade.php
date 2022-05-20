<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>TICT Export Arrival Notification</title>

        <!-- TICT icon -->
        <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" />
        <!-- Font Awesome -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        />
        <!-- Google Fonts Roboto -->
        <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        />
        <!-- MDB -->
        <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
        <style>
            .card-registration .select-input.form-control[readonly]:not([disabled]) {
                font-size: 1rem;
                line-height: 2.15;
                padding-left: .75em;
                padding-right: .75em;
            }
            .card-registration .select-arrow {
                top: 13px;
            }
        </style>
    </head>
    <body>
    <header>
    <!-- Navbar -->
        <!-- Navbar -->
        <!-- Background image -->
        <div
            class="p-5 text-center bg-image"
            style="background-image: url('{{asset("img/yard1.jpg")}}');height:fit-content; min-height:130vh;"
        >
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="row gy-1">
                    <div class="col-12">
                        <div class="d-flex justify-content-start px-2 align-items-start my-1 mx-auto">
                            <div class="text-white d-flex justify-content-center flex-column w-100 h-100 ">
                                <div class="p-1">
                                    <img src="{{asset("img/tincan_logo_color-min.png")}}" class="mx-auto" style="min-height:1rem;max-height:3rem">
                                </div>
                                <div  class="text-align-right">
                                    <h1 class="mb-1">Tincan Island Container Terminal</h1>
                                    <h4 class="mb-1">Export Arrival Notification</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mx-1">

                    </div>
                </div>
                <div class="row gx-2 mx-2">
                    <div class="col-8">
                        <table class="table table-light table-striped table-hover table-responsive">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Container No</th>
                                    <th scope="col">Booking No</th>
                                    <th scope="col">Vessel</th>
                                    <th scope="col"><abbr title="Port of discharge">POD</abbr></th>
                                    <th scope="col">Commodity</th>
                                    <th scope="col">Operator</th>
                                    <th scope="col">ISO</th>
                                    <th scope="col">VGM</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">Container No</td>
                                    <td scope="col">Booking No</td>
                                    <td scope="col">Vessel</td>
                                    <td scope="col">Port of Discharge</td>
                                    <td scope="col">Commodity</td>
                                    <td scope="col">Operator</td>
                                    <td scope="col">ISO</td>
                                    <td scope="col">VGM</td>
                                    <td scope="col"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <div class="card-body p-md-5 bg-light text-black card-registration">
                            <h3 class="mb-5 text-uppercase">Add Container</h3>

                            <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <input type="text" id="form3Example1m" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1m">Container Number</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <input type="text" id="form3Example1n" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1n">Booking Number</label>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <input type="text" id="form3Example1m1" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1m1">Vessel</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <input type="text" id="form3Example1n1" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1n1"><abbr title="Port of discharge">POD</abbr></label>
                                </div>
                            </div>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="text" id="form3Example8" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example8">Commodity</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <select class="select form-control form-control-lg">
                                        <option>Select Operator</option>
                                        @foreach ($operator as $data )
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <select class="select-input form-control form-control-lg">
                                        <option>Select ISO</option>
                                        @foreach ($iso as $data )
                                            <option value="{{$data->id}}">{{$data->name}} {{$data->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="text" id="form3Example9" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example9">VGM</label>
                            </div>

                            <div class="d-flex justify-content-end pt-3">
                            <button type="button" class="btn btn-light btn-lg">Reset</button>
                            <button type="button" class="btn btn-warning btn-lg ms-2">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <!-- Background image -->
    </header>

        <!-- MDB -->
        <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
        <!-- Custom scripts -->
        <script type="text/javascript"></script><script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
