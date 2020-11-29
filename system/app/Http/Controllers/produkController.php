<?php 

namespace App\Http\Controllers;
use App\Models\produk;
use Faker;

	class produkController extends Controller{

		function index(){
			$user = request()->user();
			$data['list_produk'] = $user->produk;
			return view('produk.index', $data);

		}
		function create(){
			return view('produk.create');
		
		}
		function store(){
			$produk = new produk;
			$produk->id_user = request()->user()->id;
			$produk->nama = request('nama');
			$produk->harga = request('harga');
			$produk->stok = request('stok');
			$produk->berat = request('berat');
			$produk->save();

			return redirect('admin/produk')->with('success', 'Data Berhasil Ditambahkan');
		
		}
		function show(produk $produk){
			$data['produk'] = $produk;
			return view('produk.show', $data);
		}
		function edit(produk $produk){
			$data['produk'] = $produk;
			return view('produk.edit', $data);
		
		}
		function update(produk $produk){
			$produk->nama = request('nama');
			$produk->harga = request('harga');
			$produk->stok = request('stok');
			$produk->berat = request('berat');
			$produk->save();

			return redirect('admin/produk')->with('success', 'Data Berhasil Diedit');;
		
		}
		function destroy(produk $produk){
			$produk->delete();

			return redirect('admin/produk')->with('success', 'Data Berhasil Dihapus');;
		
		}

		function filter(){
			$nama = request('nama');
			$stok = explode(",", request('stok'));
			$data['harga_min'] = $harga_min = request('harga_min');
			$data['harga_max'] = $harga_max = request('harga_max');
		 	//$data['list_produk'] = produk::where('nama', 'like', "%$nama%")->get();
		 	//$data['list_produk'] = produk::whereIn('stok', $stok)->get();
		 	//$data['list_produk'] = produk::whereBetween('harga', [$harga_min, $harga_max])->get();
		 	//$data['list_produk'] = produk::where('stok', '<>', $stok)->get();
		 	//$data['list_produk'] = produk::whereNotIn('stok', $stok)->get();
		 	//$data['list_produk'] = produk::whereNotBetween('harga', [$harga_min, $harga_max])->get();
		 	//$data['list_produk'] = produk::whereNull('stok')->get();
		 	//$data['list_produk'] = produk::whereNotNull('stok')->get();
		 	//$data['list_produk'] = produk::whereDate('created_at', ['2020-11-20'])->get();
		 	$data['list_produk'] = produk::whereBetween('harga', [$harga_min, $harga_max])->whereNotIn('stok', [5])->whereYear('created_at', '2020')->get();

		 	$data['nama'] = $nama;
		 	$data['stok'] = request('stok');

			return view('produk.index', $data);
		}
	}
