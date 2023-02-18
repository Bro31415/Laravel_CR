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
                            <th>Nama</th>
                            <th>Umur</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visitor as $v)
                            <tr>
                                <td>{{ $v->nama }}</td>
                                <td>{{ $v->umur }}</td>
                                
                                <td>
                                    <a href="{{ route('visitors.edit', $v->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('delete', ['id' => $v->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <a href="{{ route('visitors.create') }}" class="btn btn-success">Tambah</a>
                {{ $visitor->links() }}
            </div>  
        </div>
    </div>

</body>

</html>
