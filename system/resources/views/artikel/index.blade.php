@extends ('template.base')

@section ('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<div class="card">
				<div class="card-header"> 
					Filter
				</div>
				<div class="card-body">
					<form action="{{url ('admin/artikel/filter')}}" method="post">
						@csrf
						<div class="form-grup">
							<label for="" class="control-label">Judul</label>
							<input type="text" class="form-control" name="judul" value="{{$judul ?? ""}}">
						</div>
						<div class="form-grup">
							<label for="" class="control-label">Konten</label>
							<input type="text" class="form-control" name="konten" value="{{$konten ?? ""}}">
						</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-grup">
								<label for="" class="control-label">Terbitan</label>
								<input type="text" class="form-control" name="terbitan" value="{{$terbitan ?? ""}}">
							</div>								
						</div>							
							<button class="btn btn-dark float-right"><i class="fa fa-search">Filter</i></button>
						</form>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						Data artikel
						<a href="{{url ('admin/artikel/create')}}" class="btn btn-dark float-right"> <i class="fa fa-plus"></i>Tambah</a>
					</div>
					<div class="card-body">
						<table class="table table-datatable">
							<thead>
								<th>No</th>
								<th>Judul</th>
								<th>Konten</th>
								<th>Terbitan</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								@foreach($list_artikel as $artikel)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$artikel->judul}}</td>
									<td>{{$artikel->konten}}</td>
									<td>{{$artikel->terbitan}}</td>
									<td>
										<div class="btn-group">
											<a href="{{url ('admin/artikel', $artikel->id)}}" class="btn btn-dark"><i class="fa fa-info"></i></a>
											<a href="{{url ('admin/artikel', $artikel->id)}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
											@include('template.utils.delete', ['url' => url('admin/artikel', $artikel->id)])
										</div>

									</td>
								</tr>
								@endforeach
							</tbody>
						</table>						
					</div>					
				</div>				
			</div>
		</div>
	</div>

	@endsection