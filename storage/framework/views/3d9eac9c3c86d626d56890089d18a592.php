<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/font-awesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Maps Marker</a> 
                </div>
    <div style="color: white;
    padding: 15px 50px 5px 50px;
    float: right;
    font-size: 16px;"> Maps Marker 2024 &nbsp; 
    <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
            </nav>  

    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?php echo e(asset('assets/img/find_user.png')); ?>" class="user-image img-responsive"/>
                </li>
                <li>
                    <a href="#"><i class="fa fa-globe"></i> Maps Marker<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo e(route('home.index')); ?>">Gmaps</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('marker')); ?>">Data Marker</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper">
        <div id="page-inner" class="row">
            <div class="col-md-10">
                <form id="searchForm" class="d-flex">
                    <input type="text" id="Keterangan" name="Keterangan" class="form-control p-2 flex-fill" placeholder="Masukan Nama Tempat yang ingin di cari">
                    <button type="submit" class="btn btn-primary p-2 flex-fill">Cari</button>
                </form>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <div id="map" style="width: 100%; height: 600px;"></div>
                    </div>
                    <div class="col-md-4">
                        <form action="<?php echo e(route('marker.add')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="latitude">Latitude:</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" style="width: 70%" required>
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude:</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" style="width: 70%" required>
                            </div>
                            <div class="form-group">
                                <label for="Keterangan">Keterangan:</label>
                                <input type="text" class="form-control" id="Keterangan" name="Keterangan" style="width: 70%" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori:</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" style="width: 70%" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Marker</button>
                        </form>
                    </div>
                </div>
            </div>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <script>
                var map = L.map('map').setView([-8.6832467, 115.2095182], 11);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                var $j = jQuery.noConflict();

                //FUNGSI SEARCH TEMPAT
                $j('#searchForm').submit(function(e) {
                    e.preventDefault();
                    var Keterangan = jQuery('#Keterangan').val();
                    jQuery.get("/markers/search", {Keterangan: Keterangan}, function(data) {
                        // hapus marker sebelumnya
                        map.eachLayer(function(layer) {
                            if (layer instanceof L.Marker) {
                                map.removeLayer(layer);
                            }
                        });
                        
                        // tambahkan marker baru
                        data.forEach(function(marker) {
                            L.marker([marker.latitude, marker.longitude]).addTo(map)
                                .bindPopup(marker.Keterangan);
                        });
                    });
                });


                <?php foreach ($markers as $marker) { ?>
                    var iconUrl = ''; // Tentukan URL ikon berdasarkan kategori
                    switch ("<?= $marker->kategori ?>") {
                        case 'Universitas':
                            iconUrl = "<?php echo e(asset('assets/img/university.svg')); ?>"; // univ icon
                            break;
                        case 'Rumah Sakit':
                            iconUrl = "<?php echo e(asset('assets/img/hospital.svg')); ?>"; // rumah sakit icon
                            break;
                        case 'Bandara':
                            iconUrl = "<?php echo e(asset('assets/img/airport.svg')); ?>"; // rumah sakit icon
                            break;
                        default:
                            iconUrl = "<?php echo e(asset('assets/img/park.svg')); ?>"; //Default Icon
                    }

                    var customIcon = L.icon({
                        iconUrl: iconUrl,
                        iconSize: [20, 20]
                    });

                    L.marker([<?= $marker->latitude ?>, <?= $marker->longitude ?>], { icon: customIcon }).bindPopup("<?= $marker->Keterangan ?>").addTo(map);
                <?php } ?>
                
            </script>
        </div>
    </div>
</body>

</html>
<?php /**PATH /Users/user/Documents/GIS/laravel10/resources/views/home.blade.php ENDPATH**/ ?>