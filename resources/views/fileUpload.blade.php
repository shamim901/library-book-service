
<!-- <form action="{{ route('file-uploader')  }}" method="post"> -->
<form action="{{ route('file-uploader')  }}" method="POST" enctype="multipart/form-data" name="formName">

  @csrf
  
  <div class="mb-3">
    <label for="formFile" class="form-label">Default file input example</label>
    <!-- <input class="form-control" type="file" id="file" name="file"> -->
    <input type="file" id="imgUpload1" name = "imgUpload1">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>
