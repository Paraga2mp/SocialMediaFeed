<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Role;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkUserRole');
        // $this->middleware('checkThemeRole');
        
    }

    public function index()
    {

        $users = \App\Models\User::all();
        //dd($users);
        return view('users.index', compact('users'));

    }

    public function show($id)
    {
        $user = User::find($id); //call to the model
      
        return view('users.show', compact('user'));
        
    }

    public function create()
    {
         $roles = Role::orderBy('name')->get();
         return view('users.create', compact('roles'));
    }

    public function edit($id)
    {
        $roles = Role::orderBy('name')->get();
        $user = User::with('roles')->where('id', $id)->first();
        return view('users.edit', compact('roles', 'user'));

    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'roles' => 'required',
        ]);
    
        $input = $request->all();
    
        $user = User::find($id);
        $user->update($input);

        $user->roles()->sync($request->roles);

    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm-password' => 'required|same:password',
            'roles' => 'required'
      
        ]);

       $request['password'] =  Hash::make($request['password']);

  
        $input = $request->all();

        
        $user = User::create($input);

       
        
        // $user->assignRole($request->input('roles'));
        $user->roles()->sync($request->roles);
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');

    }

    public function destroy($id)
    {
        $user = User::find($id);

        if($user->id != 1)
        {
            $user->delete();
        }
        else
        {
            session()->flash('status', 'Unable to delete the record');
        }

        return redirect('users');


    }

    


    




    
}
