<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application - Create Author</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="/users" class="navbar-brand">CRUD APPLICATION</a>
        </div>
    </div>
    
    <div class="container" style="padding-top: 10px;">
        <h3>Update Author</h3>
        <hr>
        <form action="/authors/{{ $author->id }}/edit" method="POST">

        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $author->name }}" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $author->email }}" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Author</button>
                    <a href="{{ asset('/authors')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>