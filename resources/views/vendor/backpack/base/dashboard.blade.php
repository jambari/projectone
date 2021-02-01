@extends(backpack_view('blank'))
@section('content')
	<nav aria-label="breadcrumb" class="d-none d-lg-block">
	  <ol class="breadcrumb bg-transparent p-0 {{ config('backpack.base.html_direction') == 'rtl' ? 'justify-content-start' : 'justify-content-end' }}">

			    <li class="breadcrumb-item text-capitalize"><a href="">Admin</a></li>

			    <li class="breadcrumb-item text-capitalize active" aria-current="page">Dashboard</li>

	  </ol>
	</nav>
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
@endsection