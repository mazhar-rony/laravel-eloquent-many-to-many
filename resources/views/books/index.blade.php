<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application - Author List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD APPLICATION</a>
            {{--  <a href="{{ asset('/countries')}}" class="btn btn-primary"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Show Countries</a>  --}}
        </div>
    </div>
    
    <div class="container" style="padding-top: 10px;">
        
        <div class="row">
            <div class="col-md-6"><h3>Book List</h3></div>
            <div class="col-md-6">
                <a href="{{ asset('/authors')}}" class="btn btn-primary offset-md-5"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Show Author List</a>
                <a href="{{ asset('/books/create')}}" class="btn btn-success pull-right"><i class="fa fa-book" aria-hidden="true"></i> Add New Book</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Book Name</th>
                        <th>Book Description</th>
                        <th>ISBN</th>
                        <th>Authors</th>
                        {{--  <th>Created On</th>
                        <th>Updated On</th> --}}
                        <th colspan="2" style="text-align: center">Action</th>  
                    </tr>
                     
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->description }}</td> 
                            <td>{{ $book->isbn }}</td> 
                            <td>
                                @foreach ($book->authors as $author)
                                    <li>{{ $author->name }}</li>
                                @endforeach
                            </td>                         
                            {{--  <td>{{ $author->created_at->format('d-m-Y') }}</td>
                            <td>{{ $author->updated_at->diffForHumans() }}</td>  --}}
                            
                            {{--  <td><a href="/authors/{{$author->id}}/show" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Profile</a></td>  --}}
                            <td><a href="/books/{{$book->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
                            
                            <td>
                                <form action="/books/{{$book->id}}/delete" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> 
                            </td>        
                                </form>      
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Record not found.</td>
                        </tr
                    @endforelse
                                       
                </table>
            </div>
        </div>
        
    </div>

</body>
</html>