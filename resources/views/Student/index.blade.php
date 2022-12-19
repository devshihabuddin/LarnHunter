<h1>This is Students Index Page.</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card">
    <div class="card-body">
        <a class="btn btn-sm btn primary" href="{{route('students.create')}}">Add Student</a>
    <table class="table" border="1">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Class Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>
            @endif
            @foreach($students as $key=>$student)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->class_name}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{route('students.edit',$student->id)}}">edit</a>
                        <form action="{{route('students.destroy',$student->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                            <button class="btn btn-sm btn-danger" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>