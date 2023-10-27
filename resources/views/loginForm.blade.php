<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login to Account</title>
    
    
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link href="{{ asset('img/Ibrahim logo.jpg') }}" rel="icon" style="width: 100%;">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">


     
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    {{-- @vite('resources/css/app.css') --}}
 

  </head>
  <body style="background-color: #32969a;">
    <div style="display: grid; height: 100vh; align-content: center;">
      <div class="login" data-aos="fade-right=">
          <div id="img-flex">
              <!-- <img src="assets/img/Ibrahim logo.jpg" alt="" style="width: 20%; height: 20%;"> -->
    
              <form action="/login" method="POST" class="regForm" style="justify-content: center; background-color: #fff; width: 450px; border-radius: 20px;">
                @csrf
                <div class="container" data-aos="fade-up">
                    <div class="section-title" style="font-size: x-large; padding: 20px">
                      <img src="{{ asset('img/Ibrahim logo.jpg') }}" alt="" style="width: 150px; border-radius: 10px; box-shadow: 1px 2px 3px;">
                      <h2>Login</h2>
                
                    </div>
                    <div style="gap:5px; display:flex; flex-direction:column; width:100%; align-items:center" class="flex flex-col w-full items-center">
                      <div class="form-group mt-3 mt-md-0 w-5/6" style="display: flex; flex-direction:column; width:89%">
                        <input
                            type="email"
                            style="padding: 10px 0;"
                            class="form-control"
                            name="loginEmail"
                            id="email"
                            placeholder="Your Email"
                            required
                            value="{{old('loginName')}}"
                        />
                        @error('loginEmail')
                         <p class="text-red-500 text-xs mt-1" style="color:red; font-variant:small-caps">
                          {{$message}}
                         </p>
                        @enderror
                      </div>
                      
                      <div class="form-group mt-3 mt-md-0 w-5/6" style="display: flex; flex-direction:column;  width:89%">
                        <input
                          type="password"
                          style="padding: 10px 5px"
                          class="form-control"
                          name="loginPassword"
                          id="password"
                          placeholder="Your Password"
                          required
                          value="{{old('loginPassword')}}"
                        />
                        @error('loginPassword')
                         <p class="text-red-500 text-xs mt-1" style="color:red; font-variant:small-caps">
                          {{$message}}
                         </p>
                        @enderror
                      </div>
                      <div style="display: flex; justify-content:center">
                          {{-- <a href="{{ route('/') }}"> --}}
                            <button type="submit" class="appointment-btn scrollto" style="border-style: none; padding: 2px; width: 120px; height: 50px;">
                              <p 
                                style="font-size: large; font-weight: lighter; font-family: Arial, Helvetica, sans-serif; letter-spacing: 2px; text-align: center;">
                                Login
                              </p>
                            </button>
                          {{-- </a> --}}
                      </div>
                    </div>
              </form>
              <div style="justify-content:center; display:flex">
                <h4>Dont have an account? 
                  <span style="color: #32969a;"><a href="{{ route('registerForm') }}">Register</a></span>
                </h4>
              </div>
                  
                    <div style="display: flex; justify-content: center">
                      <h3 style="color: #32969a;"><a href="{{ route('/') }}">Go back</a></h3>
                    </div>
                    
                  </div>
                </div>
              
          </div>
      </div>
    </div>
  </body>
</html>