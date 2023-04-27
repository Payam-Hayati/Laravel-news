<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Designed by Payam Hayati">
        
        <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> --}}

        <title>Login Page</title>

        @vite('resources/js/app.js')
    </head>

    <body>
       <div class="container w-1/3 mt-10">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <a href="https://payam-hayati.ir" target="_blank">
                <img class="mx-auto h-10 w-auto" src="{{ asset("/img/logo.png") }}" title="Payam hayati" alt="Payam Hayati">
                </a>
              <h2 class="mt-8 text-center text-2xl font-bold leading-9 tracking-tight text-gray-50">Sign in to your account</h2>
            </div>
          
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
              <form class="space-y-6" action="login_check" method="POST">
               
                  @if(Session::has('message'))
                  <div class="bg-red-700 mx-auto text-center text-gray-50 rounded py-1">
                    {{ Session::get('message') }}
                  </div>
                  @endif
               
                @csrf
                {{-- {{ csrf_field() }} --}}
                <div>
                  <label for="username" class="block text-sm font-medium leading-6 text-gray-50">Username</label>
                  <div class="mt-2">
                    <input id="username" name="username" type="text" required  class="block w-full rounded-md border-0 px-2 py-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <span class="text-pink-600">
                        @if ($errors->has("username"))
                        {{ $errors->first("username") }}
                    @endif
                    </span>
                  </div>
                </div>
          
                <div>
                  <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-50">Password</label>
                    <div class="text-sm">
                      <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                    </div>
                  </div>
                  <div class="mt-2">
                    <input id="password" name="password" type="password" required autocomplete="current-password"  class="block w-full px-2 rounded-md border-0 py-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <span class="text-pink-600">
                        @if ($errors->has("password"))
                        {{ $errors->first("password") }}
                    @endif
                    </span>
                  </div>
                </div>
          
                <div>
                  <input type="submit" value="Sign in" class="flex cursor-pointer w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
                </div>
              </form>
          
              <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register Page</a>
              </p>
            </div>
          </div>
       </div>
       
        
       </div>
      
    </body>

</html>