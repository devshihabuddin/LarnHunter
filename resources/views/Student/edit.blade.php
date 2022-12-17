<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="{{route('students.update',$student->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name:</label><br>
            <input type="text" name="name" class="form-control"  placeholder=" enter name" value="{{$student->name}}" >
        </div><br>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Class Name:</label>
            <select class="form-label" name="class_id">
                @foreach($classes as $class)
                    <option value="{{$class->id}}" @if($class->id == $student->class_id) selected @endif >{{$class->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone:</label><br>
            <input type="integer" name="phone"  class="form-control" placeholder="123..."  value="{{$student->phone}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address:</label><br>
            <input type="email" name="email" class="form-control" placeholder="name@example.com"  value="{{$student->email}}">
        </div>
        <button type="submit">Submit</button>
        </form>
</body>
</html>