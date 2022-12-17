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
    <div class="card-header">
        Add New Class
    </div>
    <div class="card-body">
        <form action="{{route('class.store')}}" method="POST">
            @csrf()
            <label for="">Class Name</label><br>
            <input type="text" name="name" placeholder="Enter your class name">
            <button type="submit">submit</button>
        </form>
    </div>
    </div>
</body>
</html>

