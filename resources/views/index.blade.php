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


    {{-- Start Economic News --}}
     <div class="flex font-bold p-2 rounded red-gradient">
        <i class='fas fa-volleyball-ball mt-1'></i>  
        <h2 class="ml-2">Economic News</h2>
    </div>
    <div class="flex gap-2">
      @foreach ($economic as $eco)
      <div class="flex-1 mt-2">
        <img src="{{ asset('news_images/'.$eco["image"]) }}" alt="{{ $eco["title"] }}" title="{{ $eco["title"] }}"  />
        <a href="{{ asset("more/" .$eco["id"]) }}" class="font-semibold hover:font-bold">{{ $eco["title"] }}</a>
        <p class="mt-1">{{ $eco["description"] }}</p>
      </div>
      @endforeach
    </div>
    {{-- End Economic News --}}
<hr class="mt-6" />
    {{-- Start Sport News --}}
    <div class="flex font-bold p-2 rounded mt-8 blue-gradient">
        <i class='fas fa-volleyball-ball mt-1'></i>  
        <h2 class="ml-2">Sport News</h2>
    </div>
    <div class="flex gap-2">
      @foreach ($sports as $sport)
      <div class="flex-1 mt-2">
        <img src="{{ asset('news_images/'.$sport["image"]) }}" alt="{{ $sport["title"] }}" title="{{ $sport["title"] }}"  />
        <a href="{{ asset("more/" .$sport["id"]) }}" class="font-semibold hover:font-bold">{{ $sport["title"] }}</a>
        <p class="mt-1">{{ $sport["description"] }}</p>
      </div>
      @endforeach
    </div>
    {{-- End Sport News --}}

    <hr class="mt-6" />

     {{-- Start International News --}}
     <div class="flex font-bold p-2 rounded mt-8 orange-graient">
        <i class='fas fa-volleyball-ball mt-1'></i>  
        <h2 class="ml-2">International News</h2>
    </div>
    <div class="flex gap-2">
      @foreach ($international as $inter)
      <div class="flex-1 mt-2">
        <img src="{{ asset('news_images/'.$inter["image"]) }}" alt="{{ $inter["title"] }}" title="{{ $inter["title"] }}"  />
        <a href="{{ asset("more/" .$inter["id"]) }}" class="font-semibold hover:font-bold">{{ $inter["title"] }}</a>
        <p class="mt-1">{{ $inter["description"] }}</p>
      </div>
      @endforeach
    </div>
    {{-- End International News --}}


    
  </div> {{-- End Container --}}
</body>
<script src="{{ URL::asset('js/all.min.js') }}"></script>

</html>