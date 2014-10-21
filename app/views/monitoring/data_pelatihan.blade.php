@extends('layout.dashboard')
@section('content')
@include('notif')
<div class="row margin-top-breadcrumb">
	<ol class="breadcrumb">
		<li><a href="/dashboard" class="loadContent"><i class="fa fa-dashboard"></i> Dashboard</a>
		<li class="active"><a href="/data_pegawai" class="loadContent"><i class="fa fa-users"></i> Daftar Pegawai</a></li>
		<li class="active"><i class="fa fa-book"></i> Daftar Pelatihan</li>
	</ol>
</div>
@if(count($pelatihans)>0)
<div style="margin-top:50px" class="fixed-btn btn-right">
	<a class="btn btn-primary" href="{{url('/excel_data_pelatihan',$id_pegawai)}}"><span class="glyphicon glyphicon-download-alt"></span> Ms. Excel</a>
</div>
@endif
<div class="fixed-btn btn-right">
	<a class="btn btn-success loadContent" onclick="return false" href="{{url('/add_data_pelatihan',$id_pegawai)}}"><span class="glyphicon glyphicon-plus"></span></a>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		<h1>{{$pegawai->nama}}</h1>
		<h1><small>{{$pegawai->nip}}</small>
	</div>
</div>
<div class="row">
	<div class="col-md-12 center-form text-center">
		{{Form::open(['url'=>'/search_data_pelatihan','method'=>'GET','class'=>'form-inline dataGet','onsubmit'=>'return false'])}}
		<div class="form-group input-group">
			{{Form::text('pelatihan','',['class'=>'form-control input-lg'])}}
			<div class="input-group-btn">
				{{Form::hidden('p',$id_pegawai)}}
				<button type="submit" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@if(!count($pelatihans)>0)
		<h1 class="text-center">Tidak ada data pelatihan</h1>
		@else
		<div class="text-center">
			{{$pelatihans->appends(Input::all())->links()}}
		</div>
		<table class="table table-condensed table-striped">
			<thead  class="text-center">
				<th>Pelatihan</th>
				<th class="text-center"><span class="glyphicon glyphicon-calendar"></span></th>
				<th class="text-center">Lama (Hari)</th>
				<th class="text-center">Tahun</th>
				<th>Tempat</th>
				<th>Surat Tugas</th>
				<th class="text-center">Lulus/Tidak</th>
				<th class="text-center">Score</th>
				<th><span class="glyphicon glyphicon-tasks"></span></th>
			</thead>
			@foreach($pelatihans as $pelatihan)
			<tr>
				<td>{{$pelatihan->pelatihan->pelatihan}}</td>
				<td class="text-center">{{$pelatihan->tanggal}}</td>
				<td class="text-center">{{$pelatihan->lama}}</td>
				<td class="text-center">{{$pelatihan->tahun}}</td>
				<td>{{$pelatihan->tempat}}</td>
				<td>{{$pelatihan->no_surat_tugas}}</td>
				<td class="text-center">{{$pelatihan->lulus}}</td>
				<td class="text-center">{{$pelatihan->score}}</td>
				<td class="dropdown">
					<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></a>
					<ul class="dropdown-menu pull-right">
						<li><a class="dropdown-update loadContent" href="{{url('/edit_data_pelatihan',$pelatihan->id)}}"><span class="glyphicon glyphicon-edit"></span> Ubah</a></li>
						<li><a class="dropdown-delete loadContent" href="{{url('/delete_data_pelatihan/'.$pelatihan->id_pegawai,$pelatihan->id)}}"><span class="glyphicon glyphicon-trash"></span> Hapus</a></li>
					</ul>
				</td>
			</tr>
			@endforeach
		</table>
		<div class="text-center">
			{{$pelatihans->links()}}
		</div>
		@endif
	</div>
</div>
@stop