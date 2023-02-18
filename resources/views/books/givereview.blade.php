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
    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('UPDATE ITEM') }} </div>
        <div class="card-body">
            @forelse($books as $book)
            
            <form action="{{route('reviewBook', ['id' => $book->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                @foreach($book->reviews()->get() as $bookreviews)
                <div class="mb-3">
                    <label for="Review" class="form-label">Review</label>
                    <input name="Review" type="text" value="{{$bookreviews}}" class="form-control" id="formGroupExampleInput" placeholder="Input Title of Book">
                </div>
                @endforeach
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-success">Unggah  Komentar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
