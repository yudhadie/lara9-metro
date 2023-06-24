<?php

namespace App\Http\Controllers\Admin\Information;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return view('admin.information.activity.index',[
            'title' => 'Activity',
            'breadcrumbs' => Breadcrumbs::render('activity'),
        ]);
    }

    public function show($id)
    {
        $data = Activity::FindorFail($id);

        return view('admin.information.activity.show',[
            'title' => 'Detail Activity',
            'breadcrumbs' => Breadcrumbs::render('activity.show',$data),
            'data' => $data,
        ]);
    }
}
