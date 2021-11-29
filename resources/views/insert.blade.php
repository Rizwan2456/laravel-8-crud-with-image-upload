<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student form</title>
  </head>
  <style>
    .required:after {
       content:" *";
       color: red;
       }
 </style>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="my-2">Student Form</h1>
                <form action="{{ route('students.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf;
                    @method("POST")
                    <div class="mb-3">
                        <label  class="form-label required">Student Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    @error('name')
                        <span class="alert-danger">{{$message}}</span>
                    @enderror
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label required">Email address:</label>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail1">
                    </div>
                    @error('email')
                        <span class="alert-danger">{{$message}}</span>
                    @enderror
                    <div class="mb-3">
                      <label class="form-label required">Select image:</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  @if (session()->has('status'))
                     <div class="alert alert-success">{{session('status')}}</div> 
                  @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>