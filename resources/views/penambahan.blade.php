<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penambahan Saldo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <style>
        body {
            background-color: #1572e8; /* Warna biru untuk background */
        }

        .form-container {
            background-color: #fff; /* Background putih untuk form */
            border-radius: 10px; /* Membuat sudut form melengkung */
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Memberikan efek bayangan */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh; /* Membuat form berada di tengah layar */
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6 form-container">
            <h2 class="form-header">Penambahan Saldo</h2>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif  

            <form method="POST" action="/home">
                @csrf
                <div class="form-group mb-3">
                    <label for="InputSaldo">Nominal</label>
                    <input type="number" class="form-control" name="nominal" placeholder="Enter nominal">
                    @error('nominal')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="Input">Tipe</label>
                    <select class="form-select" aria-label="Default select example" name="tipe">
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="Input">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="Enter deskripsi">
                    @error('deskripsi')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <a href="{{ url('/home') }}" class="btn btn-secondary w-150 mb-3">kembali</a>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
