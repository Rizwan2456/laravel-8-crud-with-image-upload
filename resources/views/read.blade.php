<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Students List</title>
  </head>
  <body>
    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <h1>Students List</h1>
                <a href="{{ route('students.create') }}" class="btn btn-primary float-end">Add Student</a>
                @if (session()->has('status'))
                    <div class="alert alert-primary float-start">{{session()->get('status')}}</div>
                @endif

            </div>
        </div>
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-striped table-hover mt-1">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Image</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                            
                        <tr>
                            <th scope="row">{{$student->id}}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->image}}</td>
                            <td><a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                             <form action="{{ route('students.destroy', $student->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')   
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger"/>
                             </form>
                            </td>
                        </tr>
                        @endforeach
                       
                        </tbody>
                    </table>
              </div>
        </div>
    </div>
    
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>