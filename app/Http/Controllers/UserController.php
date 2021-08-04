<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::beginTransaction();
        try {

            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            DB::commit();
            session()->flash('flash_success', "Salvo com sucesso");
            return redirect()->route('user-index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('flash_error', 'Falha ao salvar');
            return redirect()->route('user-create')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($userId)
    {
        $user = User::find($userId);
        return view('users.delete', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
        $user = User::find($userId);
        return view('users.edit', compact('user'));
    }

    public function read($userId)
    {
        $user = User::find($userId);
        return view('users.read', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::beginTransaction();
        try {

            $data = $request->all();
            $data['password'] = bcrypt($data['password']);

            User::find($userId)->update($data);
            DB::commit();

            session()->flash('flash_success', "Salvo com sucesso");
            return redirect()->route('user-index');
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            session()->flash('flash_error', 'Falha ao salvar');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        DB::beginTransaction();
        try {
            $user = User::find($userId);
            $user->delete();
            DB::commit();
            session()->flash('flash_success', "Usuário deletado com sucesso");
            return redirect()->route('user-index');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('flash_error', 'Falha ao salvar');
            return redirect()->back();
        }
    }
}
