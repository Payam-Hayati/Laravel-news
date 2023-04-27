@extends("admin.panel")
@section("content")

@if(Session::has('error_message'))
  <div class="alert-error">
    {{ Session::get('error_message') }}
  </div>
@endif

@if(Session::has('success_message'))
  <div class="alert-success">
    {{ Session::get('success_message') }}
  </div>
@endif


<form action="{{ asset('admin/category/update_check/' . $category->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
  @csrf
  <div>
    <label for="title" class="block text-sm font-semibold">Title</label>
    <div class="mt-2">
      <input id="title" value="{{ $category->title }}" name="title" type="text" required class="block w-full rounded-md border-0 px-2 py-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
    </div>
   
      @if ($errors->has("title"))
      <span class="text-pink-600">
      {{ $errors->first("title") }}
    </span>
  @endif
  
  </div>

  <div class="mt-4">
    <input type="submit" value="Update Category" class="flex cursor-pointer w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
  </div>
</form>
@endsection