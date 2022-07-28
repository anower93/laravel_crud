<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirapod Host  Crud Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	    <style>
        .students-pic{
          height: 50px;
          width: 50px;

        
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-5 text-center"> Nirapod Host Data Edit! </h1>
                <a href="{{ route('home') }}"> Home</a>
            <i>@if (session('success'))
                {{ session('success') }}
            @endif</i>
            <form class="form" action="{{ route('update', ['id' => encrypt($data->id)]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" value="{{ $data->name }}" class="form-control"> <br>
                <input type="text" name="phone" value="{{ $data->phone }}" class="form-control"><br>
                <input type="text" name="email" value="{{ $data->email }}" class="form-control"><br>
                <input type="file" name="picture"> <br>
				<img class="students-pic" src="{{ asset('uploads/'.$data->picture) }}" alt=""> <br>
                <input class="mt-3" type="submit" value="Update" name="update" >
            </form>
        </div>
    </div>

</div>

</body>
</html>