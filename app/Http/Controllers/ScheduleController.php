<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Patient;
use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::getSchedules();
        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('schedules.create', compact('patients', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $data = $request->all();
            Schedule::create($data);
            DB::commit();
            session()->flash('flash_success', "Salvo com sucesso");
            return redirect()->route('schedule-index');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('flash_error', 'Falha ao salvar');
            return redirect()->route('schedule-create')->withInput();
        }
    }

    /**
     * Display for delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $schedule = Schedule::getSchedulesById($id);
        return view('schedules.delete', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('schedules.edit', compact('schedule', 'patients', 'doctors'));
    }

    public function read($id)
    {
        $schedule = Schedule::find($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('schedules.read', compact('schedule', 'patients', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $data = $request->all();
            Schedule::find($id)->update($data);
            DB::commit();

            session()->flash('flash_success', "Salvo com sucesso");
            return redirect()->route('schedule-index');
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
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Schedule::find($id)->delete();
            DB::commit();
            session()->flash('flash_success', "Agendamendo excluído com sucesso");
            return redirect()->route('schedule-index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('flash_error', 'Falha ao salvar');
            return redirect()->back();
        }
    }
}
