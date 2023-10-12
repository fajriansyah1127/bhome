<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="   crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <style>
        #map {
            width: 100%;
            height: 900px;
        }
    </style>
</head>


<body class="fixed-nav sticky-footer bg-dark text-white" id="page-top">
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark p-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">B-Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"> </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="pesan.php">KONTAK </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="modal" data-target="#exampleModal" href="login.php">
                            <i class="fa fa-sign-in"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="map">

    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>


    <script>
        // initialize the map on the "map" div with a given center and zoom
        var map = L.map('map', {
            center: [-1.2505195, 116.8637703],
            zoom: 17
        });

        let data = <?php echo json_encode($data); ?>;

        var iconBlue = L.icon({
            iconUrl: 'admin/img/icon_biru.png',
            iconSize: [55, 55],
            iconAnchor: [27, 55],
            tooltipAnchor: [27, -25]
        });

        var iconGray = L.icon({
            iconUrl: 'admin/img/icon_abu.png',
            iconSize: [44, 44],
            iconAnchor: [22, 44],
            tooltipAnchor: [22, -20]
        });


        data.map(function(d) {

            var icon = iconGray
            if (d.nama != 'Tidak Berpenghuni') {
                icon = iconGray
            } else {
                icon = iconBlue
            }


            L.marker([d.latitude, d.longtitude], {
                icon: icon
            }).addTo(map).bindTooltip(`
  <b>Alamat: Jl. Contoh 123</b><br>
  <b>Type Rumah: Tipe Contoh</b><br>
  <b>Harga Rumah: $500,000</b><br>
`);
        })


        console.log(data);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
            foo: 'bar',
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    </script>
</body>

</html>
