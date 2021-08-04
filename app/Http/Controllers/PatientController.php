<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
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
            Patient::create($data);
            DB::commit();
            session()->flash('flash_success', "Salvo com sucesso");
            return redirect()->route('patient-index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('flash_error', 'Falha ao salvar');
            return redirect()->route('patient-create')->withInput();
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
        $patient = Patient::find($id);

        $patient->sexo = ($patient->sexo == 'f' ? 'Feminino' : 'Masculino');
        // dd($patient);
        switch ($patient->status_civil) {
            case 's':
                $patient->status_civil = "Solteiro";
                break;
            case 'c':
                $patient->status_civil = "Casado";
                break;
            case 'd':
                $patient->status_civil = "Divorciado";
                break;
            default:
                $patient->status_civil = "Viuvo";
                break;
        }

        return view('patients.delete', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patients.edit', compact('patient'));
    }

    public function read($id)
    {
        $patient = Patient::find($id);
        return view('patients.read', compact('patient'));
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
            Patient::find($id)->update($data);
            DB::commit();

            session()->flash('flash_success', "Salvo com sucesso");
            return redirect()->route('patient-index');
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
            Patient::find($id)->delete();
            DB::commit();
            session()->flash('flash_success', "Paciente deletado com sucesso");
            return redirect()->route('patient-index');
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            session()->flash('flash_error', 'Falha ao salvar');
            return redirect()->back();
        }
    }
}
