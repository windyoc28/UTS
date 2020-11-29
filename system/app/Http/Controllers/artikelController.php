<?php 

namespace App\Http\Controllers;
use App\Models\artikel;
use Faker;

	class artikelController extends Controller{

		function index(){
			$user = request()->user();
			$data['list_artikel'] = $user->artikel;
			return view('artikel.index', $data);

		}
		function create(){
			return view('artikel.create');
		
		}
		function store(){
			$artikel = new artikel;
			$artikel->judul = request('judul');
			$artikel->konten = request('konten');
			$artikel->terbitan = request('terbitan');
			$artikel->save();

			return redirect('admin/artikel')->with('success', 'Data Berhasil Ditambahkan');
		
		}
		function show(artikel $artikel){
			$data['artikel'] = $artikel;
			return view('artikel.show', $data);
		}
		function edit(artikel $artikel){
			$data['artikel'] = $artikel;
			return view('artikel.edit', $data);
		
		}
		function update(artikel $artikel){
			$artikel->judul = request('judul');
			$artikel->konten = request('konten');
			$artikel->terbitan = request('terbitan');
			$artikel->save();

			return redirect('admin/artikel')->with('success', 'Data Berhasil Diedit');;
		
		}
		function destroy(artikel $artikel){
			$artikel->delete();

			return redirect('admin/artikel')->with('success', 'Data Berhasil Dihapus');;
		
		}

		function filter(){
			$judul = request('judul');
			$terbitan = explode(",", request('terbitan'));
			//$data['konten_min'] = $konten_min = request('konten_min');
			//$data['konten_max'] = $konten_max = request('konten_max');
		 	//$data['list_artikel'] = artikel::where('judul', 'like', "%$judul%")->get();
		 	//$data['list_artikel'] = artikel::whereIn('terbitan', $terbitan)->get();
		 	//$data['list_artikel'] = artikel::whereBetween('konten', [$konten_min, $konten_max])->get();
		 	//$data['list_artikel'] = artikel::where('terbitan', '<>', $terbitan)->get();
		 	//$data['list_artikel'] = artikel::whereNotIn('terbitan', $terbitan)->get();
		 	//$data['list_artikel'] = artikel::whereNotBetween('konten', [$konten_min, $konten_max])->get();
		 	//$data['list_artikel'] = artikel::whereNull('terbitan')->get();
		 	//$data['list_artikel'] = artikel::whereNotNull('terbitan')->get();
		 	//$data['list_artikel'] = artikel::whereDate('created_at', ['2020-11-20'])->get();
		 	//$data['list_artikel'] = artikel::whereBetween('konten', [$konten_min, $konten_max])->whereNotIn('terbitan', [5])->whereYear('created_at', '2020')->get();

		 	$data['judul'] = $judul;
		 	$data['terbitan'] = request('terbitan');

			return view('artikel.index', $data);
		}
	}
