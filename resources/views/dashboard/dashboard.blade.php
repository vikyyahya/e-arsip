@extends('home')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <!-- <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol> -->
      </div><!-- /.col -->


    </div><!-- /.row -->

    <div class="row mt-2">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">

            <p style="text-align:justify">
              &nbsp; PT. Surya Rengo Containers adalah salah satu perusahaan yang bergerak di bidang industri karton box / kotak kemasan. Perusahaan ini terletak di jalan KH. Agus Salim No.4 RT/RW 01/07 Poris Plawad, Cipondoh 15141 Kota Tangerang. Perusahaan ini berdiri sejak tahun 1975 dengan nama di PT. Aneka Karton Elok dan diberi izin operasional dari BKPN sesuai dengan, SK No. 265 tahun 1976 dengan status PMDN. Pada pertengahan tahun 1977 dilaksanakan produksi percobaan dengan jumlah karyawan 100 orang hingga pada tahun 1983 jumlah karyawan meningkat menjadi 400 orang hingga pada tahun itu pula perusahaan meningkatkan usahanya yaitu membuka cabang / pabrik di surabaya dengan nama di PT. Unibox (Unity Sakti Corrugated Carton dan Box Making) dengan jumlah karyawan 300 orang dan berlokasi di Jl. Rungkut Industri I / 4 Surabaya.
            </p>
            <p style="text-align:justify">
              &nbsp; Pada tanggal 22 Desember 1992 perusahan mengadakan kerjasama dengan perusahaan industri karton box terbesar di Jepang yaitu Rengo Co. Ltd. dan dengan Salim Group (Indonesia), dengan perbandingan modal 60% PT. Griya Mas Sejahtera (Salim Group) dan 40% Swasta Jepang (Rengo Co.Ltd.) dan status perusahaan berubah menjadi Penanaman Modal Asing (PMA).
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="card">
          <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="/image/bg-0.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="/image/bg-1.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="/image/bg-2.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="/image/bg-3.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <!-- /.card-body -->
        </div>

      </div>
    </div>



    <!-- /.card -->

  </div>
</div>

@endsection