<?php

namespace App\Http\Controllers;

use App\Ketentuan;
use App\User;
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
        $user = User::paginate(25);
        $ketentuan = $this->ketentuan();
        return view('user/index', compact('user', 'ketentuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ketentuan = $this->ketentuan();
        return view('user/create', compact('ketentuan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($this->storeReq());
        $this->Pass($user);

        return redirect()->action('UserController@index')->with('store', 'Berhasil menambahkan user !');
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
        $ketentuan = Ketentuan::all();

        return view('user/edit', compact('user', 'ketentuan'));
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
        $user = User::find($id);
        $user->update($this->updateReq());
        $this->Pass($user);

        return redirect()->action('UserController@index')->with('update', 'Berhasil mengubah user !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $count = User::where('role', $user->role)->count();
        $ket = Ketentuan::where([
            ['qualifier', 'ROLE'],
            ['code', $user->role],
        ])->first();
        if ($count == 1) {
            return redirect()->action('UserController@index')->with('fail', 'Gagal menghapus data karena '.$ket->localizedName.' hanya tersisa 1 !');
        } else {
            User::destroy($id);
            return redirect()->action('UserController@index')->with('delete', 'Berhasil menghapus user !');
        }
        
    }

    public function storeReq()
    {
        return tap(request()->validate([
            'email' => 'required|unique:users',
            'role' => 'required',
            'name' => 'required',
            'password' => 'required|string'
            ]), 
            function(){
                
            }
            
        );
    }
    
    public function Pass($user)
    {
        if (request('password') != null) {
            request()->validate([
                'password' => 'required|string'
            ]);
            $user->update([
                'password' => Hash::make(request('password'))
            ]);
        }
    }

    public function updateReq()
    {
        return tap(request()->validate([
            'email' => 'required',
            'role' => 'required',
            'name' => 'required',
            ]), 
            function(){
                
            }
            
        );
    }
}
