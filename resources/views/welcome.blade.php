<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi PT Tiansa Abadi Jaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="row bg-dark border-bottom border-warning "  style="padding: 10px;" >
    <div class="col-lg-12 col-md-12 col-xs-12" >
          <a href="/">
          <h3 class="text-warning text-center "><img class="" src="/images/logo-tja.png" wide="35" height="40" alt="company-profile"> PT Tiansa Jaya Abadi</h3>
        </a>
    </div>
  </div>
  <div class="row bg-dark" style="padding:10px;" >
    <div class="col-lg-6 col-md-6 col-xs-12  d-flex justify-content-center">
      <a href="/kehadirans/masuk" class="btn btn-primary text-light">Masuk</a>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12 d-flex justify-content-center">
      <a href="/kehadirans/pulang" class="btn btn-danger">Pulang</a>
    </div>
    <!-- <div class="col-lg-4 col-md-4 col-xs-12 d-flex justify-content-center">
      <a href="/buatizin" class="btn btn-warning">Izin</a>
    </div> -->
  </div>
<br>
<div class="container">
  <div class="row " style="">
      <div class="col-lg-6 col-md-6 col-xs-12">
        <table class="table" >
          <th>No</th>
          <th>Nama</th>
          <th>Absen</th>
          <th>Jam</th>
          <tbody>
            @if ($absens)
                @foreach ($absens as $absen)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $absen->nama }} </td>
                    <td @if ($absen->jenis == 'masuk') class="bg-success text-light " @else class="bg-danger text-white" @endif > {{ $absen->jenis }} </td>
                    <td> {{ $absen->created_at }} </td>
                    <td></td>
                  </tr>
                @endforeach
            @endif
          </tbody>
        </table>
      </div>
      <div class="col-lg-6 col-md-6 col-xs-12">
        <div class="card" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Total Karyawan  <span class="badge bg-info float-right text-light">{{ $totalkaryawan ?? '0' }}</span></li>
            <li class="list-group-item">Total absen masuk <span class="badge bg-success float-right text-light  ">{{ $totalabsenmasuk ?? '0' }}</span></li>
            <li class="list-group-item">Total absen pulang <span class="badge bg-danger float-right text-light ">{{ $totalabsenpulang ?? '0' }}</span></li>
          </ul>
        </div>
        <br>
        <div class="card" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item bg-warning ">PERIZINAN</li>
            <li class="list-group-item">Alpa <span class="badge bg-danger float-right text-light">{{ $alpa ?? '0' }}</span></li>
            <li class="list-group-item">izin <span class="badge bg-danger float-right text-light">{{ $izin ?? '0' }}</span></li>
            <li class="list-group-item">Cuti <span class="badge bg-danger float-right text-light">{{ $cuti ?? '0' }}</span></li>
            <li class="list-group-item">Sakit <span class="badge bg-danger float-right text-light">{{ $sakit ?? '0' }}</span> </li>
          </ul>
        </div>
      </div>
  </div>
</div>
<br>
  <div class="row bg-dark border-bottom border-warning "  style="padding: 10px;" >
    <div class="col-lg-12 col-md-12 col-xs-12" >
          <h3 class=" text-center text-warning " id="jam" ></h3>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
var d = new Date();
document.getElementById("jam").innerHTML = d;
</script>

</body>
</html>