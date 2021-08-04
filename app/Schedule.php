<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    protected $guarded = [];

    public static function getSchedules()
    {
        return DB::table('schedules')
            ->join('doctors', 'schedules.doctor_id', '=', 'doctors.id')
            ->join('patients', 'schedules.patient_id', '=', 'patients.id')
            ->select('schedules.*', 'doctors.name as doctor', 'doctors.specialty' , 'patients.name as patient')
            ->get();
    }

    public static function getSchedulesById($id)
    {
        return DB::table('schedules')
            ->join('doctors', 'schedules.doctor_id', '=', 'doctors.id')
            ->join('patients', 'schedules.patient_id', '=', 'patients.id')
            ->select('schedules.*', 'doctors.name as doctor', 'doctors.specialty' , 'patients.name as patient')
            ->where('schedules.id', $id)
            ->get()->first();
    }
}
