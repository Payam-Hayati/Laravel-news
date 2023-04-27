<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Designed by Payam Hayati">

  {{-- <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
  <link href="{{ URL::asset('css/all.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
  

  <title>Login Page</title>

  @vite('resources/js/app.js')
</head>

<body>
    <div class="container">
        <div class="admin-mother flex gap-1 mx-auto justify-center content-center">
            
            <div class="col-left flex-auto max-w-xs rounded text-gray-900 bg-gray-100 p-4">
                <div class="text-center">
                    <a href="https://payam-hayati.ir" target="_blank">
                        <img class="mx-auto admin-logo h-20" src="{{ asset("/img/logo.png") }}" title="Payam hayati" alt="Payam Hayati">
                        <span class="mt-2 text-sm">Hello Admin<span>
                    </a>
                </div>
                <hr class="mt-4" />
               
               
                <ul class="admin-menu ">
                    <li>Manage Categories</li>
                    <div class="ml-2 font-normal">
                        <li><a href="{{ asset('admin/category/add') }}">- Add Category</a></li>
                        <li><a href="{{ asset('admin/category/show') }}">- View Categories</a></li>
                      </div>
                    <hr />
                    <li>Manage News</li>
                      <div class="ml-2 font-normal">
                        <li><a href="{{ asset('admin/news/add') }}">- Add News</a></li>
                        <li><a href="{{ asset('admin/news/show') }}">- View news</a></li>
                      </div>
                    <hr />
                    <li><a href="{{ asset('admin/account') }}">Profile</a></li>
                    <hr />
                    <li><a href="{{ asset('/') }}" target="_blank">Visit Site</a></li>
                    <hr />
                    <li><a href="{{ asset('/exit') }}">Exit</a></li>
                </ul>
            </div>
            <div class="col-right flex-auto  rounded text-gray-900 bg-gray-100 p-4">
                <div class="date mb-2">
                    Date: 1986/01/19
                </div>
                <hr />

                <div class="dynamic-content">
                    @yield('content')
                </div>
            </div>
           
        </div>
    </div>
</body>

<script src="{{ URL::asset('js/all.min.js') }}"></script>

</html>