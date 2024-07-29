<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
    <title>Library</title>

    <style>
     .btn-dark {
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
     }   
     .btn.dark i {
        margin-center: 10px;
     }
    </style>
</head>
<body>
    <div class="form-group mb-3">
        <a href="{{ url('books/create') }}" class="btn btn-primary">Add New Book Entry</a>
       
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>title</th>
                                <th>author</th>
                                <th>description</th>
                                <th>isbn</th>
                                <th>published_year</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->description }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->published_year }}</td>
                                <td>
                                <a href="{{ url('books', $book->id) }}/edit" class="btn btn-outline-success btn-sm">Edit</a>
                                <form action="{{ url('books'), $book->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                               </form> 
                                </td>
                               @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>