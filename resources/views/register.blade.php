<!DOCTYPE html>
<html lang="en">
    <head>
    
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <title>Register Account</title>
        
        <meta content="" name="description" />
        <meta content="" name="keywords" />

        <link href="{{ asset('img/Ibrahim logo.jpg') }}" rel="icon" style="width: 100%;">
        <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">


        
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 

    </head>  
    <body style="background-color: #32969a; padding: 1%; display: flex; justify-content:center">
        <div>
            <div class="login" data-aos="fade-right=">
                <div id="img-flex">
                    <!-- <img src="assets/img/Ibrahim logo.jpg" alt="" style="width: 20%; height: 20%;"> -->
            
                    <form action="/register" method="POST" style="padding:10px 0; justify-content: center; background-color: #fff; width: 500px; border-radius: 0px;">
                        @csrf
                        <div class="container" data-aos="fade-up">
                            <div class="section-title" style="font-size: x-large;">
                                <img src="{{ asset('img/Ibrahim logo.jpg') }}" alt="" style="width: 150px; border-radius: 10px; border: 1px solid #32969a; box-shadow: 2px 2px 3px;">
                                <h2>Register</h2>
                        
                            </div>
            
                            <div class="row" style="display: flex; justify-content:center; flex-direction:column; gap:5px">
                                <div class="col-md-4 form-group" style="display: flex; flex-direction:column; justify-content:center">
                                    <input
                                        type="text"
                                        name="name"
                                        style="width: 88%; padding: 3%;"
                                        class="form-control"
                                        id="name"
                                        placeholder="Full Name"
                                        required
                                        value="{{old('name')}}"
                                    />
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1"style="color:red; font-variant:small-caps">
                                        {{$message}}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group mt-3 mt-md-0" style="display: flex;flex-direction:column; justify-content:center">
                                    <input
                                        type="email"
                                        style="width: 88%; padding: 3%;"
                                        class="form-control"
                                        name="email"
                                        id="email"
                                        placeholder="Your Email"
                                        required
                                        value="{{old('email')}}"
                                    />
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1" style="color:red; font-variant:small-caps">
                                        {{$message}}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-md-4 flex form-group mt-3 mt-md-0" style="display: flex; flex-direction:column; justify-content:center">
                                    <input
                                    type="password"
                                    style="width: 88%; padding: 3%;"
                                    class="form-control"
                                    name="password"
                                    id="password"
                                    placeholder="Your Password"
                                    required
                                    value="{{old('password')}}"
                                    />
                                    @error('password')
                                        <p class="text-red-500 text-xs mt-1" style="color:red; font-variant:small-caps">
                                        {{$message}}
                                        </p>
                                    @enderror
                                </div>

                                <div style="display: flex; justify-content:center">
                                    {{-- <a href="{{ route('loginForm') }}"> --}}
                                    <button type="submit" class="appointment-btn scrollto" style="border-style: none; padding: 2px; width: 120px; height: 50px;">
                                        <p style="font-size: large; font-weight: lighter; font-family: Arial, Helvetica, sans-serif; letter-spacing: 2px; text-align: center;">
                                            Register
                                        </p>
                                    </button>
                                    {{-- </a> --}}
                                </div>
                            </div>

                            <div style="display: flex; justify-content:center"><h4>Already have an account? <span style="color: #0eecf0;"><a href="{{ route('loginForm') }}">Login</a></span></h4></div>
                    
                            <div style="display: flex; justify-content:center">
                            <h3 style="color: #32969a;"><a href="{{ route('/') }}">Go back</a></h3>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>