<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="shortcut icon" href="assets/image/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Pemesanan Hotel Lampung</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <img src="assets/image/logo_hotel_lampung.jpg" alt="Logo Hotel Lampung" class="brand-image img-circle">
                    <span class="brand-text font-weight-light">Hotel Lampung</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="kamar.php" class="nav-link">kamar</a>
                        </li>
                        <li class="nav-item">
                            <a href="fasilitas_hotel.php" class="nav-link">Fasilitas Hotel</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>
                    </ul>
                    <!-- SEARCH FORM -->
                </div>
                <!-- Right navbar links -->
            </div>
        </nav>
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <marquee style=" font-size:24px; color:light;">
                        Selamat Datang Di Hotel Lampung </marquee>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">HOTEL LAMPUNG</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="content">
                <div class="container">
                    <div class="col-md-12">
                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "gagal") { ?>
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan !!!</h5>
                                    Mohon maaf Username dan Password yang anda masukkan tidak terdaftar
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-lg-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block" src="assets/image/home1.jpg" alt="First slide" height="600" width="1200">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block" src="assets/image/home2.jpg" alt="Second slide" height="600" width="1200">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block" src="assets/image/home3.jpg" alt="Third slide" height="600" width="1200">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-left"></i>
                                            </span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right"></i>
                                            </span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

                </div>


                <div class="container">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">
                                <h2 class="text-center">Tentang Kami</h2><br>
                                <p style="font-size: 20px;" class="text-center">Lepaskan diri Anda ke Hotel
                                    Lampung,dikelilingi oleh keindahan pegunungan yang indah, danau , dan sawah
                                    menghijau.
                                    Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari
                                    terbenam.
                                    yang memukau, Kid's Club yang luas - menawarkan beragam fasilitas dan kegiatan
                                    anak-anak
                                    yang akan melengkapi kenyamanan keluarga. Convention Center kami, dilengkapi
                                    pelayanan
                                    lengkap dengan ruang konvensi terbesar di Bandung, mampu mengakomodasi hingga 3.000
                                    delegasi. Manfaatkan ruang penyelenggaraan konvensi MILC.E ataupun mewujudkan acara
                                    pernikahan adat yang mewah.
                                </p>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="mapouter">
                                    <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=500&amp;height=400&amp;hl=en&amp;q=smkn 8 bandar lampung&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://mcpenation.com/">Minecraft Website</a></div>
                                    <style>
                                        .mapouter {
                                            position: relative;
                                            text-align: right;
                                            width: 100%;
                                            height: 450px;
                                        }

                                        .gmap_canvas {
                                            overflow: hidden;
                                            background: none !important;
                                            width: 100%;
                                            height: 450px;
                                        }

                                        .gmap_iframe {
                                            height: 450px !important;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="mt-5 mb-5" style=" font-family:'Montserrat'; ">Berikan Komentar Dan Ulasan Anda</h2>
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <h1 class="text-warning mt-4 mb-4">
                                        <b><span id="average_rating">0.0</span> / 5</b>
                                    </h1>
                                    <div class="mb-3">
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                    </div>
                                    <h3><span id="total_review">0</span> komentar</h3>
                                </div>
                                <div class="col-sm-4">
                                    <p>
                                    <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i>
                                    </div>

                                    <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i>
                                    </div>

                                    <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i>
                                    </div>

                                    <div class="progress-label-right">(<span id="total_three_star_review">0</span>)
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i>
                                    </div>

                                    <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i>
                                    </div>

                                    <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                    </div>
                                    </p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <h3 class="mt-4 mb-3">Write Review Here</h3>
                                    <button type="button" name="add_review" id="add_review" class="btn btn-danger">Review</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5" id="review_content"></div>
                </div>

                <div id="review_modal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Submit Review</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-center mt-2 mb-4">
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                </h4>
                                <div class="form-group">
                                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                                </div>
                                <div class="form-group">
                                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <button type="button" class="btn btn-dark" id="save_review">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .progress-label-left {
                        float: left;
                        margin-right: 0.5em;
                        line-height: 1em;
                    }

                    .progress-label-right {
                        float: right;
                        margin-left: 0.3em;
                        line-height: 1em;
                    }

                    .star-light {
                        color: #161a18;
                    }
                </style>

                <script>
                    $(document).ready(function() {

                        var rating_data = 0;

                        $('#add_review').click(function() {

                            $('#review_modal').modal('show');

                        });

                        $(document).on('mouseenter', '.submit_star', function() {

                            var rating = $(this).data('rating');

                            reset_background();

                            for (var count = 1; count <= rating; count++) {

                                $('#submit_star_' + count).addClass('text-warning');

                            }

                        });

                        function reset_background() {
                            for (var count = 1; count <= 5; count++) {

                                $('#submit_star_' + count).addClass('star-light');

                                $('#submit_star_' + count).removeClass('text-warning');

                            }
                        }

                        $(document).on('mouseleave', '.submit_star', function() {

                            reset_background();

                            for (var count = 1; count <= rating_data; count++) {

                                $('#submit_star_' + count).removeClass('star-light');

                                $('#submit_star_' + count).addClass('text-warning');
                            }

                        });

                        $(document).on('click', '.submit_star', function() {

                            rating_data = $(this).data('rating');

                        });

                        $('#save_review').click(function() {

                            var user_name = $('#user_name').val();

                            var user_review = $('#user_review').val();

                            if (user_name == '' || user_review == '') {
                                alert("Please Fill Both Field");
                                return false;
                            } else {
                                $.ajax({
                                    url: "submit_rating.php",
                                    method: "POST",
                                    data: {
                                        rating_data: rating_data,
                                        user_name: user_name,
                                        user_review: user_review
                                    },
                                    success: function(data) {
                                        $('#review_modal').modal('hide');

                                        load_rating_data();

                                        alert(data);
                                    }
                                })
                            }

                        });

                        load_rating_data();

                        function load_rating_data() {
                            $.ajax({
                                url: "submit_rating.php",
                                method: "POST",
                                data: {
                                    action: 'load_data'
                                },
                                dataType: "JSON",
                                success: function(data) {
                                    $('#average_rating').text(data.average_rating);
                                    $('#total_review').text(data.total_review);

                                    var count_star = 0;

                                    $('.main_star').each(function() {
                                        count_star++;
                                        if (Math.ceil(data.average_rating) >= count_star) {
                                            $(this).addClass('text-warning');
                                            $(this).addClass('star-light');
                                        }
                                    });

                                    $('#total_five_star_review').text(data.five_star_review);

                                    $('#total_four_star_review').text(data.four_star_review);

                                    $('#total_three_star_review').text(data.three_star_review);

                                    $('#total_two_star_review').text(data.two_star_review);

                                    $('#total_one_star_review').text(data.one_star_review);

                                    $('#five_star_progress').css('width', (data.five_star_review / data
                                        .total_review) * 100 + '%');

                                    $('#four_star_progress').css('width', (data.four_star_review / data
                                        .total_review) * 100 + '%');

                                    $('#three_star_progress').css('width', (data.three_star_review /
                                        data
                                        .total_review) * 100 + '%');

                                    $('#two_star_progress').css('width', (data.two_star_review / data
                                        .total_review) * 100 + '%');

                                    $('#one_star_progress').css('width', (data.one_star_review / data
                                        .total_review) * 100 + '%');

                                    if (data.review_data.length > 0) {
                                        var html = '';

                                        for (var count = 0; count < data.review_data.length; count++) {
                                            html += '<div class="row mb-3">';

                                            html +=
                                                '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' +
                                                data.review_data[count].user_name.charAt(0) +
                                                '</h3></div></div>';

                                            html += '<div class="col-sm-11">';

                                            html += '<div class="card">';

                                            html += '<div class="card-header"><b>' + data.review_data[
                                                    count]
                                                .user_name + '</b></div>';

                                            html += '<div class="card-body">';

                                            for (var star = 1; star <= 5; star++) {
                                                var class_name = '';

                                                if (data.review_data[count].rating >= star) {
                                                    class_name = 'text-warning';
                                                } else {
                                                    class_name = 'star-light';
                                                }

                                                html += '<i class="fas fa-star ' + class_name +
                                                    ' mr-1"></i>';
                                            }

                                            html += '<br />';

                                            html += data.review_data[count].user_review;

                                            html += '</div>';

                                            html += '<div class="card-footer text-right">On ' + data
                                                .review_data[
                                                    count].datetime + '</div>';

                                            html += '</div>';

                                            html += '</div>';

                                            html += '</div>';
                                        }

                                        $('#review_content').html(html);
                                    }
                                }
                            })
                        }

                    });
                </script>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <style>
        body {
            font-family: 'Montserrat';
        }
    </style>
    <script type="text/javascript">
        var date = new Date();
        var day = date.getDate()
        var month = date.getMonth() + 1
        var year = date.getFullYear()
        if (day < 10) {
            day = '0' + day
        }
        if (month < 10) {
            month = '0' + month
        }


        var minDate = year + '-' + month + '-' + day
        document.getElementById('tanggal').setAttribute("min", minDate);
        document.getElementById('tanggall').setAttribute("min", minDate);
    </script>
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>