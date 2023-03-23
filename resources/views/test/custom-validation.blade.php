
<form action="{{ route('custom-validation')  }}" method="POST" enctype="multipart/form-data" name="formName">

  @csrf

  <div class="mb-3">
    <label for="formFile" class="form-label">Default file input example</label>
    <!-- <input class="form-control" type="file" id="file" name="file"> -->
    <div class="form-group mt-3">
        <label>Birth Year</label>
        <input type="number"
            name="birth_year"
            placeholder="E.g. 1990"
            class="form-control"
            value="{{ old('birth_year') }}"
            maxlength="4">
        @if ($errors->has('birth_year'))
            <span class="text-danger text-left">{{ $errors->first('birth_year') }}</span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>
