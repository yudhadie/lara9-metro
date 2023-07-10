<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function team()
    {
        $data = Team::orderBy('name','asc')->get();

        return datatables()->of($data)
        ->addColumn('action', 'admin.setting.role.action')
        ->addIndexColumn()
        ->addColumn('use', function($data){
           return $data->user->count();
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function user()
    {
        $data = User::orderBy('name','asc')->get();

        return datatables()->of($data)
        ->addColumn('action', 'admin.setting.user.action')
        ->addIndexColumn()
        ->addColumn('role', function($data){
            return $data->currentTeam->name;
        })
        ->addColumn('status', function($data){
            if ($data->active == 1) {
                return'<span class="text-success">Active</span>';
            }else {
                return'<span class="text-danger">Inactive</span>';
            }
        })
        ->rawColumns(['action','status'])
        ->toJson();
    }

    public function activity()
    {
        $data = Activity::latest();

        return datatables()->of($data)
        ->addColumn('action', 'admin.information.activity.action')
        ->addIndexColumn()
        ->addColumn('user', function($data){
            if ($data->causer_id == null) {
                $user = 'system';
            } else {
                $user = $data->user->name;
            }
            return $user;
        })
        ->addColumn('time', function($data){
            return Carbon::parse($data->created_at)->diffForHumans();
        })
        ->addColumn('data', function($data){
            return $data->log_name.' ('.$data->subject_id.')';
        })
        ->addColumn('events', function($data){
            if ($data->event == 'created') {
                return'<span class="badge badge-light-success fs-8 fw-bolder">Created</span>';
            }  elseif ($data->event == 'updated') {
                return'<span class="badge badge-light-warning fs-8 fw-bolder">Updated</span>';
            } else {
                return'<span class="badge badge-light-danger fs-8 fw-bolder">Deleted</span>';
            }
        })
        ->rawColumns(['action','events'])
        ->toJson();
    }
}
