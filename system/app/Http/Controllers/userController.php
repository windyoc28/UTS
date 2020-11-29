<?php 

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\userdetail;

	class userController extends Controller{

		function index(){
			$data['list_user'] = user::withCount('produk')->get();
			return view('user.index', $data);

		}
		function create(){
			return view('user.create');
		
		}
		function store(){
			$user = new user;
			$user->nama = request('nama');
			$user->email = request('email');
			$user->username = request('username');
			$user->password = bcrypt(request('password'));
			
			$user->save();

			$userdetail = new userdetail;
			$userdetail->id_user = $user->id;
			$userdetail->no_hp = request('no_hp');
			$userdetail->save();

			return redirect('admin/user')->with('success', 'Data Berhasil Ditambahkan');

		
		}
		function show(user $user){
			$data['user'] = $user;
			return view('user.show', $data);
		}
		function edit(user $user){
			$data['user'] = $user;
			return view('user.edit', $data);
		
		}
		function update(user $user){
			$user->nama = request('nama');
			$user->email = request('email');
			$user->username = request('username');
			if(request('password')) $user->password = bcrypt(request('password'));
			
			$user->save();

			return redirect('admin/user')->with('success', 'Data Berhasil Diedit');;
		
		}
		function destroy(user $user){
			$user->delete();

			return redirect('admin/user')->with('success', 'Data Berhasil Dihapus');;
		
		}
	}
