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
            
            <form action="{{route('updateBook', ['id' => $book->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input name="judul" type="text" value="{{$book->judul}}" class="form-control" id="formGroupExampleInput" placeholder="Input Title of Book">
                    @error('judul')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
 
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input name="penulis" type="text" value="{{$book->penulis}}" class="form-control" id="formGroupExampleInput" placeholder="Input Author of Book">
                    @error('penulis')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="tgl_rilis" class="form-label">Tanggal Rilis</label>
                    <input name="tgl_rilis" type="date" value="{{$book->tgl_rilis}}" class="form-control" id="formGroupExampleInput" placeholder="Input Release Date of Book">
                    @error('tgl_rilis')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
