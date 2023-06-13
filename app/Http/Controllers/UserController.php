<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Request\StoreUserRequest;
use App\Http\Request\UpdateUserRequest; 


class UserController extends Controller
{
    //Display all Users
    // @return \illuminate\Http\Response
    
    public function index(){
        $users = User::latest()->paginate(10);
        
        return view('users.index', compact('users'));
    }
    
    //Show form for creating user
    // @return \illuminate\Http\Response
    
    public function create(){
        return view('users.create');
    }

    // menyimpan pengguna yang sudah dibuat 
    //@return \illuminate\Http\Response
    
    public function store(User $user, StoreUserRequest $request){
        $user->create(array_merge($request->validated(),[
            'password' => 'test'
        ]));
        return redirect()->route('users.index')
            ->withSucces(__('User created successfully.'));
    }

    //menampilkan data pengguna
    
    public function show(User $user){
        return view('users.edit', [
            'user' => $user
        ]);
    }
    
    //edit data user
    public function edit(User $user){
        return view('users.edit', [
            'user' => $user
        ]);
    }
    //update data user
    
    public function update(User $user, UpdateUserRequest $request){
        $user->update($request->validated());
        
        return redirect()->route('users.index')->withSucces(__('User updated succesfully. '));
    }

    //menghapus data user

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('users.index')->withSucces(__('User deleted successfully.'));
    }
}