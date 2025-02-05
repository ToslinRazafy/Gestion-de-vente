<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function index(){
        return view('user.index', ['users' => User::where('id', '!=', Auth::user()->id)->orderBy('id', 'desc')->paginate(12)]);  
    }

    public function create(){
        return view('user.create');
    }

    public function store(UserRequest $request){
        $data = $request->validated();
        if($request->validated('role') != null){
            $data['role'] = 'Admin';
        }else{
            $data['role'] = 'Vendeur';
        }
        User::create($data);
        return redirect()->route('user.list')->with('success','Utilisater a bien ete enregistrer');
    }

    public function delete(User $user){
        $user->delete();
        return back()->with("success","Suppression avec success");
    }
}
