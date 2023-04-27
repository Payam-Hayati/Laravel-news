<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Designed by Payam Hayati">

  <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('css/all.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> --}}

  <title>News Laravel Website</title>

  @vite('resources/js/app.js')
</head>

<body>
  <div class="container">


   

    {{-- Search --}}
    <div class="py-4 max-w-7xl mx-auto">
      <form action="{{URL::asset('search')}}" method="post">
        {{csrf_field()}}
        <div class="flex">
          <input class="min-w-full" type="text" name="search" placeholder="Search..." />
        <button type="submit" name="submit">
          <i class='fas fa-search text-2xl ml-2'></i> 
        </button>
        </div>
      </form>

    </div>


    {{-- Search Result --}}
     <div class="flex font-bold p-2 rounded red-gradient">
      <i class='fas fa-search  mt-1'></i> 
        
        <h2 class="ml-2">Search Result</h2>
    </div>
    <div class="flex gap-2">
      @foreach ($news as $nw)
      <div class="flex-1 mt-2">
        <img src="{{ asset('news_images/'.$nw["image"]) }}" alt="{{ $nw["title"] }}" title="{{ $nw["title"] }}"  />
        <a href="{{ asset("more/" .$nw["id"]) }}" class="font-semibold hover:font-bold">{{ $nw["title"] }}</a>
        <p class="mt-1">{{ $nw["description"] }}</p>
      </div>
      @endforeach
    </div>
    


   


    
  </div> {{-- End Container --}}
</body>
<script src="{{ URL::asset('js/all.min.js') }}"></script>

</html>