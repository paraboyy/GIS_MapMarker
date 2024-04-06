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
                <div>
                    <div style="width:100%">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Description</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($markers as $marker)
                                    <tr>
                                        <td>{{ $marker->latitude }}</td>
                                        <td>{{ $marker->longitude }}</td>
                                        <td>{{ $marker->Keterangan }}</td>
                                        <td>{{ $marker->kategori }}</td>
                                        <td>
                                            <a href="{{ route('edit', ['id' => $marker->id]) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('marker.delete', ['id' => $marker->id]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda ingin mengahapus marker ini?');">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
