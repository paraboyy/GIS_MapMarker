<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Maps Marker</a> 
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">Maps Marker 2024 &nbsp; 
                <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>  

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="{{ asset('assets/img/find_user.png') }}" class="user-image img-responsive"/>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-globe"></i> Maps Marker<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('home.index') }}">Gmaps</a>
                            </li>
                            <li>
                                <a href="{{ route('marker') }}">Data Marker</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="container mt-5">
                    <form action="{{ route('marker.edit', ['id' => $marker->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" class="form-control" value="{{ $marker->latitude }}">
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" class="form-control" value="{{ $marker->longitude }}">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="Keterangan" class="form-control">{{ $marker->Keterangan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori">kategori</label>
                            <textarea name="kategori" class="form-control">{{ $marker->kategori }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Marker</button>
                    </form>

                </div>
            </div>
        </div>
</body>
</html>
