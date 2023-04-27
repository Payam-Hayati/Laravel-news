@extends("admin.panel")
@section("content")

@if (Session::has('success_message'))
  <div class="alert-success">{{ Session::get('success_message') }}</div>
@endif
<table class="border-collapse border-2 border-slate-500">
    <thead>
      <tr class="border-2 border-sky-600">
        <th class="border-4 border-sky-600">#</th>
        <th class="border-4 border-sky-600">Title</th>
        <th class="border-4 border-sky-600">Edit</th>
        <th class="border-4 border-sky-600">Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        @foreach ($categories as $c)
        <tr class="border-2 border-sky-600">
            <td class="border border-sky-600">{{ $i++ }}</td>
            <td class="border border-sky-600">{{ $c["title"] }}</td>
            <td class="border border-sky-600">
            <a href="{{ asset('admin/category/update/'.$c["id"]) }}">
                <i class="fa-solid fa-pen"></i>    
            </a>
           </td>
            <td class="border border-sky-600">
            <a href="{{ asset('admin/category/delete/'.$c["id"]) }}">
                <i class="fa-solid fa-trash"></i>    
            </a></td>
          </tr>
        @endforeach
     
    </tbody>
  </table>
  <div class="mt-2">
    {{ $categories->links() }}
  </div>
@endsection