<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return view('admin.setting.role.index',[
            'title' => 'Role',
            'breadcrumbs' => Breadcrumbs::render('role'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:teams|max:255',
        ]);

        $data = new Team();
        $data->name = $request->name;
        $data->user_id = 1;
        $data->personal_team = 1;
        $data->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Team::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail Data',
            'data'    => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:teams,name,'.$id,
        ]);

        $data = Team::find($id);

        $data->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diupdate');

    }

    public function destroy($id)
    {
        $data = Team::find($id);
        $data->delete();

        return redirect()->back()->with('error', 'Data berhasil dihapus');
    }
}
