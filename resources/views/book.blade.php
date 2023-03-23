
<!-- <form action="{{ route('file-uploader')  }}" method="post"> -->

@foreach($books as $book)
        {{$book->name}}
@endforeach
<form action="{{ route('book-store')  }}" method="POST" enctype="multipart/form-data" name="formName">

  @csrf

  <div class="mb-3">
    <label for="formFile" class="form-label">Default file input example</label>
    <!-- <input class="form-control" type="file" id="file" name="file"> -->
    <input type="text" id="name" name = "name">
    <input type="text" id="author_id" name = "author_id">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>
