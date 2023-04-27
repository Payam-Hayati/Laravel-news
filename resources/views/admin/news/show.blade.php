@extends("admin.panel")
@section("content")

@if (Session::has('success_message'))
  <div class="alert-success pb-4">{{ Session::get('success_message') }}</div>
@endif
<table class="border-collapse border-2 border-slate-500">
    <thead>
      <tr class="border-2 border-sky-600">
        <th class="border-4 border-sky-600">#</th>
        <th class="border-4 border-sky-600">Title</th>
        <th class="border-4 border-sky-600"Date</th>
        <th class="border-4 border-sky-600">Edit</th>
        <th class="border-4 border-sky-600">Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        @foreach ($news as $n)
        <tr class="border-2 border-sky-600">
            <td class="border border-sky-600">{{ $i++ }}</td>
            <td class="border border-sky-600">{{ $n["title"] }}</td>
            <td class="border border-sky-600">{{ $n["date"] }}</td>
            <td class="border border-sky-600">
            <a href="{{ asset('admin/news/update/'.$n["id"]) }}">
                <i class="fa-solid fa-pen"></i>    
            </a>
           </td>
            <td class="border border-sky-600">
            <a href="{{ asset('admin/news/delete/'.$n["id"]) }}">
                <i class="fa-solid fa-trash"></i>    
            </a></td>
          </tr>
        @endforeach
     
    </tbody>
  </table>
  <div class="mt-2">
    {{ $news->links() }}
  </div>
@endsection