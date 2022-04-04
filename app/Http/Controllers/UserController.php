<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pengguna = User::all();
        // dd($data_pengguna);

        return view('user.index',compact('data_pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('adad');
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'verify_password' => 'required',
            
        ]);

        if($validated['password'] == $validated['verify_password']){
            User::create([
                'name'=>$request->name,
                'nomor'=>$request->nomor,
                'jeniskelamin'=>$request->jenis_kelamin,
                'alamat'=>$request->alamat,
                'email'=>$request->email,
                'username'=>$request->username,
                'password'=>Hash::make($request->password),
                
            ]);
        }

        return redirect()->route('user');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.create',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'username' => 'required',
        
            
        ]);

        $user = User::find($id);

        if(isset($request->password) && isset($request->verify_password)){
            if($request->password == $request->verify_password){
                $user->password = Hash::make( $request->password);
            }
        }
        if($request->nomor){
            $user->nomor = $request->nomor;
        }
        $user->fill($validated);
        $user->save();
        // dd($user);

        return redirect()->route('user');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user');

        
    }
}
