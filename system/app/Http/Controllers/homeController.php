<?php 

namespace App\Http\Controllers;

	class homeController extends Controller{

		function showBeranda(){
			return view('beranda');
		}

		function showArtikel(){
			return view('artikel');
		}

		function showProduk(){
			return view('produk');
		}

		function showKategori(){
			return view('kategori');
		}

		function showLogin(){
			return view('login');
		}

		function showRegistrasi(){
			return view('registrasi');
		}
	}
