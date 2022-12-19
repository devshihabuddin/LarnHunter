
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table" border="1">
 
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Class Name</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
   <h1>This is index page </h1>
   <a class="btn btn-primary" style="float: top;" href="{{route('class.create')}}">Add New Class</a>
   @foreach($classes as $key=>$class)
   <tr>
      <td scope="col">{{++$key}}</td>
      <td scope="col">{{$class->class_name}}</td>
      <td>
        <a class="btn btn-info" href="{{route('class.edit',$class->id)}}">Edit</a>
         <a class="btn btn-danget" href="{{route('class.destroy',$class->id)}}">Delete</a>
        <!-- <button type="button" id="delete-{{$class->id}}"  class="btn btn-sm btn-outline-danger">delete</button>
        <form id="delete-{{$class->id}}" action="{{route('class.destroy',$class->id)}}" method="POST" style="display: none;">
          @csrf
          @method('delete')
        </form> -->
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
{{$classes->links()}}
</html>
