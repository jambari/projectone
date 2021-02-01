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
    <div class="col-lg-4 col-md-4 col-xs-12  d-flex justify-content-center">
      <a href="/kehadirans/masuk" class="btn btn-primary text-light">Masuk</a>
    </div>
    <div class="col-lg-4 col-md-4 col-xs-12 d-flex justify-content-center">
      <a href="/kehadirans/pulang" class="btn btn-danger">Pulang</a>
    </div>
    <div class="col-lg-4 col-md-4 col-xs-12 d-flex justify-content-center">
      <a href="/buatizin" class="btn btn-warning">Izin</a>
    </div>
  </div>
  </div>
<br>
<div class="container">
  <div class="row" style="">
      <div class="col-lg-12 col-md-12 col-xs-12 d-flex justify-content-center">
            <form action="{{ route('izin') }}" method="post" id="myform">
            {{ csrf_field() }}
                <fieldset>
                    <legend>Izin</legend>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="nama">Nama</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="nama" >
                                    @if ($karyawans)
                                        @foreach ($karyawans as $karyawan)
                                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="jenis">Kategori</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="jenis" required >
                                    <option value="1">Alpa</option>
                                    <option value="2">Izin</option>
                                    <option value="3">Cuti</option>
                                    <option value="4">Sakit</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="jenis">Dari</label>
                                </div>
                                <input  class="form-control" type="date" id="dari"  name="dari" value="" placeholder="" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="sampai">Sampai</label>
                                </div>
                                <input class="form-control" type="date" id="dari"  name="sampe" value="" placeholder="" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="sampai">Keterangan</label>
                                </div>
                                <input class="form-control" type="text" id="dari"  name="keterangan" value="" placeholder="keterangan/keperluan" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="file">Surat Keterangan</label>
                                </div>
                                <input class="form-control" type="file" id="dari"  name="file" value="" placeholder="keterangan/keperluan" required>
                            </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Submit" class="btn btn-primary btn-lg btn-block">
                        </div>
                    </div>
                </fieldset>
            </form>
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
<script language="JavaScript">
var d = new Date();
document.getElementById("jam").innerHTML = d;
</script>

</body>
</html>