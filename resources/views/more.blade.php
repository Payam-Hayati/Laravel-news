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
        <h1>{{ $news->title }}</h1>
        <img src="{{ asset('news_images/'.$news["image"]) }}" alt="{{ $news["title"] }}" title="{{ $news["title"] }}"  />
        <p>{{ $news->description }}</p>
        <label class="text-sm">Date: {{ $news->date }}</label>
        |
        Category:
        <a href="{{ asset('category/' . $news->category_id) }}" class="text-sm"> {{ $news->category->title }}</a>
        |
        <label class="text-sm">Writer: {{ $news->admin->fname . ' ' . $news->admin->lname }}</label>
    </div>
</body>
<script src="{{ URL::asset('js/all.min.js') }}"></script>

</html>