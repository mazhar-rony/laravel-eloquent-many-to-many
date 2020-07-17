<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application - Create Book</title>
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
        <h3>Create Book</h3>
        <hr>
        <form action="/books/create" method="POST">

        @csrf

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" name="description" value="" placeholder="" class="form-control" cols="30" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN Number</label>
                    <input type="text" id="isbn" name="isbn" value="" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Authors Name</label>
                    <select name="authors[]" id="authors" class="form-control" multiple>
                        <option disabled selected>Select Authors</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Book</button>
                    <a href="{{ asset('/books')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>