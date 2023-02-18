<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Inventory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.c
ss">
</head>

<body style="background: rgb(244, 244, 244)">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tanggal Rilis</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Reviews</th>
                            <th>Tags / Categories</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td>{{ $book->judul }}</td>
                                <td>{{ $book->penulis }}</td>
                                <td>{{ $book->tgl_rilis }}</td>
                                <td>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('delete', ['id' => $book->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                        @foreach ($book->reviews()->get() as $bookreviews)
                                            <div class="card shadow-sm mb-2">
                                                <div class="card-body">
                                                    <i class="fa fa-comments"></i> {{ $bookreviews->review }}
                                                </div>
                                            </div>
                                        @endforeach
                                </td>
                                <td>
                                    @foreach ($book->tags()->get() as $tags)
                                        <p class = "fa fa-comments">{{ $tags->tag }}</p>
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <a href="{{ route('books.create') }}" class="btn btn-success">Tambah</a>
                {{ $books->links() }}
                
            </div>
            </div>
        </div>
    </div>

</body>

</html>
