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
        .btn-success a, .btn-danger a {
            color:white;
          }

    </style>
</head>
<body>

<div class="container">
<div class="row"> 
<div class="col-md-12">

<h1> Nirapod Host Data Collection </h1>
@if(session('success'))

    <i> {{ session('success') }} </i>
    
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="mt-5 form" action="{{ route('create') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input class="mt-3" type="text" name="name" placeholder="Name here" class="form-control">
    <input class="mt-3" type="text" name="phone" placeholder="Phone Number here" class="form-control">
    <input class="mt-3" type="text" name="email" placeholder="Email address here" class="form-control">
    <input type="file" name="picture">
    <input class="mt-3" type="submit" value="Save" name="save" >
</form>

<hr>

<h5 class="mt-5"> Showing Info: </h5>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Picture</th>
    </tr>
  </thead>
  <tbody>
    @forelse ( $data as $single )
    <tr>
      <th scope="row">{{ $single->id }}</th>
      <td>{{ $single->name }}</td>
      <td>{{ $single->phone }}</td>
      <td>{{ $single->email }}</td>
       <td><img class="students-pic" src="{{ asset('uploads/'.$single->picture) }}" alt=""></td>
	  <td> <Button class="btn btn-success"><a href="{{ route('edit', encrypt($single->id)) }}">Edit</a></Button> ||
        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('delete', ['id' => encrypt($single->id)]) }}">Delete</a>
</td>
    </tr>
    @empty
    <td colspan="5" class="text-center">No Data Found!</td>
    @endforelse
  </tbody>
</table>




</div>
</div>
 </div>


</body>
</html>