<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Cashflow</title>
    <link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon">

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Lato:300,400,700,900"]
            },
            custom: {
                families: [
                    "Flaticon",
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('assets/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                <a href="{{ url('index.html') }}" class="logo">
                    {{-- <img src="{{ asset('assets/img/logo.svg') }}" alt="navbar brand" class="navbar-brand"> --}}
                    <h1 class="navbar-brand font-weight-bold text-white">Family Cashflow</h1>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="#collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
                <div class="container-fluid">
                    {{-- <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div> --}}
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('assets/img/binzul.webp') }}" alt="Profile"
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg">
                                                <img src="{{ asset('assets/img/binzul.webp') }}" alt="image profile"
                                                    class="avatar-img rounded">
                                            </div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ session('role') }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <form action="{{ url('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="{{ asset('assets/img/binzul.webp') }}" alt="Profile"
                                class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <span class="user-level">{{ session('role') }}</span>
                                    {{-- <span class="caret">sdfghjkl</span> --}}
                                    <h4>{{ Auth::user()->name }}</h4>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                {{-- <span class="caret"></span> --}}
                            </a>
                            {{-- <div class="collapse" id="dashboard">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ url('demo1/index.html') }}">
                                            <span class="sub-item">Dashboard 1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('demo2/index.html') }}">
                                            <span class="sub-item">Dashboard 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="panel-header">
                    <div class="page-inner py-5">
                        @if (session('success'))
                            <div class="alert alert-success auto-dismiss-alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('danger'))
                            <div class="alert alert-danger auto-dismiss-alert">
                                {{ session('danger') }}
                            </div>
                        @endif

                        @if (session('info'))
                            <div class="alert alert-info auto-dismiss-alert">
                                {{ session('info') }}
                            </div>
                        @endif
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="fw-bold text-dark pb-2">Family Cashflow</h2>
                            </div>
                            <div class="ml-md-auto py-md-0 py-2">
                                <a href="{{ url('home/create') }}"
                                    class="btn btn-dark btn-border btn-round text-dark mr-2">Pemasukan &
                                    Pengeluaran</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big icon-info bubble-shadow-small text-center">
                                                <i class="fas fa-dollar-sign"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-sm-0 ml-3">
                                            <div class="numbers">
                                                <p class="card-category">Saldo</p>
                                                <h4 class="card-title">Rp. {{ number_format($nominal, 0, ',', '.') }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big icon-success bubble-shadow-small text-center">
                                                <i class="fas fa-user-plus"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-sm-0 ml-3">
                                            <div class="numbers">
                                                <p class="card-category">Pemasukan</p>
                                                <h4 class="card-title">Rp. {{ number_format($pemasukan, 0, ',', '.') }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big icon-danger bubble-shadow-small text-center">
                                                <i class="fas fa-user-minus"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-sm-0 ml-3">
                                            <div class="numbers">
                                                <p class="card-category">Pengeluaran</p>
                                                <h4 class="card-title">Rp. {{ number_format($pengeluaran, 0, ',', '.') }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="riwayat">
                                        <h4 class="card-title">Riwayat</h4>
                                    <a href="/export" class="btn btn-success btn-sm">Export</a>
                                    </div>
                                    <form action="/home" method="get" class="filter">
                                        <select name="filter" id="filter">
                                            <option value="pemasukan">Pemasukan</option>
                                            <option value="pengeluaran">Pengeluaran</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-round btn-sm   ">Filter</button>
                                        <a href="/admin" class="btn btn-secondary btn-round btn-sm">Reset</a>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table-striped table-hover table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Nominal</th>
                                                    <th>Tipe</th>
                                                    <th>Deskripsi</th>
                                                    <th>Date</th>
                                                    @if (session('role') === 'admin')
                                                        <th>Tools</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->nominal }}</td>
                                                        <td>{{ $item->tipe }}</td>
                                                        <td>{{ $item->deskripsi }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        @if (Auth::user()->role == 'admin')
                                                            <td><a href="{{ url('home/' . $item->id . '/edit') }}"
                                                                    class="btn btn-warning">Edit</a>
                                                                <form action="{{ url('home/' . $item->id) }}"
                                                                    method="Post" class="d-inline"
                                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Atlantis JS -->
    <script src="{{ asset('assets/js/atlantis.min.js') }}"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/js/setting-demo2.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable();

            // DataTables multi-filter select example
            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>');
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
        // Ambil semua elemen dengan class 'auto-dismiss-alert'
        const alerts = document.querySelectorAll('.auto-dismiss-alert');
        
        // Loop setiap alert dan set waktu untuk menghilangkan
        alerts.forEach(function(alert) {
            // Set timeout untuk menghilangkan alert setelah 5 detik (5000 ms)
            setTimeout(function() {
                alert.style.display = 'none';
            }, 5000); // Kamu bisa ubah 5000 sesuai dengan kebutuhan
        });
    });
    </script>
</body>

</html>
