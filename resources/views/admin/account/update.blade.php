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


<form action="{{ asset('admin/account/update_check/' . $admin->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
  @csrf
  <div>
    <label for="fname" class="block text-sm font-semibold">Name</label>
    <div class="mt-2">
      <input id="fname" name="fname" value="{{ $admin->fname }}" type="text" required class="block w-full rounded-md border-0 px-2 py-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      @if($errors->has('fname'))
            <div class="error_msg">{{$errors->first('fname')}}</div>
        @endif
    </div>
  </div>

  <div class="mt-4">
    <label for="lname" class="block text-sm font-semibold">Family</label>
    <div class="mt-2">
      <input id="lname" name="lname" value="{{ $admin->lname }}" type="text" required class="block w-full rounded-md border-0 px-2 py-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      @if($errors->has('lname'))
            <div class="error_msg">{{$errors->first('lname')}}</div>
        @endif
    </div>
  </div>

  <div class="mt-4">
    <label for="file" class="block text-sm font-semibold mb-1">Image</label>
    <input type="file" name="image" />
  </div>

  <div class="mt-4">
    <input type="submit" value="Update Account" class="flex cursor-pointer w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
    @if($errors->has('image'))
    <div class="error_msg">  {{$errors->first('image')}}</div>
@endif
  </div>
</form>
@endsection