<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Update Form</title>
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
                <form action="{{ route('students.update', $student->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf;
                    @method("PUT")
                    <div class="mb-3">
                        <label  class="form-label required">Student Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$student->name}}">
                    </div>
                    @error('name')
                    <span class="alert-danger">{{$message}}</span>
                    @enderror
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label required">Email address:</label>
                      <input type="email" class="form-control" name="email" value="{{$student->email}}" id="exampleInputEmail1">
                    </div>
                    @error('email')
                        <span class="alert-danger">{{$message}}</span>
                    @enderror
                    <div class="mb-3">
                      <label class="form-label required">Select image:</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <img src="{{ asset('image')."/".$student->image }}" alt="img" class="image-fluid" width='300px'><br><br>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>