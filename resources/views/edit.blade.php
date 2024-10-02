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
            background-color: #007bff;
            /* Warna biru untuk background */
        }

        .card {
            background-color: #fff;
            /* Warna putih untuk card */
            border-radius: 10px;
            /* Sudut card melengkung */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Efek bayangan */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Membuat form berada di tengah layar */
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-md-6">
            <div class="card">
                <h2 class="form-title">Penambahan Saldo</h2>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ url('/home/' . $data->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label for="InputSaldo">Nominal</label>
                        <input type="number" class="form-control" name="nominal" placeholder="Enter nominal"
                            value="{{ $data->nominal }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="Input">Tipe</label>
                        <select class="form-select" aria-label="Default select example" name="tipe">
                            <option value="pemasukan" {{ $data->tipe == 'pemasukan' ? 'selected' : '' }}>Pemasukan
                            </option>
                            <option value="pengeluaran" {{ $data->tipe == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran
                            </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="Input">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Enter deskripsi"
                            value="{{ $data->deskripsi }}">
                    </div>

                    <a href="{{ url('/home') }}" class="btn btn-secondary mb-3">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-submit w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
