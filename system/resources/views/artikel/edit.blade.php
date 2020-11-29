@extends ('template.base')

@section ('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<div class="card">
				<div class="card-header">
					Edit Data Artikel
				</div>	
				<div class="card-body">
					<form action="{{url ('admin/artikel', $artikel->id)}}" method="post">
						@csrf
						@method("PUT")
					<div class="form-group">
						<label for="" class="control-label">Judul</label>
						<input type="text" class="form-control" name="judul" value="{{$artikel->judul}}">							
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="" class="control-label">Konten</label>
								<input type="text" class="form-control" name="konten" value="{{$artikel->konten}}">							
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="" class="control-label">Terbitan</label>
								<input type="text" class="form-control" name="terbitan" value="{{$artikel->terbitan}}">							
							</div>
						
						<button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
						</form>						
					</div>
				</div>				
			</div>				
		</div>
	</div>
</div>

@endsection