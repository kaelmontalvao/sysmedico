<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
        ]);

        DB::beginTransaction();
        try {

            $data = $request->all();
            Doctor::create($data);
            DB::commit();
            session()->flash('flash_success', "Salvo com sucesso");
            return redirect()->route('doctor-index');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('flash_error', 'Falha ao salvar');
            return redirect()->route('doctor-create')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $doctor= Doctor::find($id);

        $doctor->sexo = ($doctor->sexo == 'f' ? 'Feminino' : 'Masculino');
        // dd(doctor;
        switch ($doctor->status_civil) {
            case 's':
                $doctor->status_civil = "Solteiro";
                break;
            case 'c':
                $doctor->status_civil = "Casado";
                break;
            case 'd':
                $doctor->status_civil = "Divorciado";
                break;
            default:
                $doctor->status_civil = "Viuvo";
                break;
        }

        return view('doctors.delete', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor= Doctor::find($id);
        return view('doctors.edit', compact('doctor'));
    }

    public function read($id)
    {
        $doctor= Doctor::find($id);
        return view('doctors.read', compact('doctor'));
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();
        try {

            $data = $request->all();
            Doctor::find($id)->update($data);
            DB::commit();

            session()->flash('flash_success', "Salvo com sucesso");
            return redirect()->route('doctor-index');
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
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Doctor::find($id)->delete();
            DB::commit();
            session()->flash('flash_success', "Médico deletado com sucesso");
            return redirect()->route('doctor-index');
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            session()->flash('flash_error', 'Falha ao salvar');
            return redirect()->back();
        }
    }
}
