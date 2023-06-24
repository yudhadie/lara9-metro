<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::orderby('name','asc')->get();

        return view('admin.setting.user.index',[
            'title' => 'Users',
            'breadcrumbs' => Breadcrumbs::render('user'),
            'teams' => $team,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|max:255',
            'username' => 'required|unique:users|max:255',
        ]);
        $data =  new User();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        // activity()->log('Tambah User '.$request->name);
        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan');
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
        $data = User::FindOrFail($id);
        $teams = Team::where('id','!=',$data->current_team_id)->orderby('name','asc')->get();

        return view('admin.setting.user.edit',[
            'title' => 'Edit Users',
            'breadcrumbs' => Breadcrumbs::render('user.edit',$data),
            'teams' => $teams,
            'data' => $data,
        ]);
    }

    public function profile()
    {
        return view('admin.setting.user.profile',[
            'title' => 'Profile',
            'breadcrumbs' => Breadcrumbs::render('profile'),
            'data' => Auth::user(),
        ]);
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
        $request->validate([
            'email' => 'required|unique:users,email,'.$id,
            'username' => 'required|unique:users,username,'.$id,
        ]);

        $user = User::find($id);
        $photo = $user->profile_photo_path;

        if ($request->hasFile('profile_photo_path')) {
            $photo = $request->file('profile_photo_path')->store('uploads/user');
        }

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'current_team_id' => $request->current_team_id,
            'active' => $request->active,
            'profile_photo_path' => $photo,
        ]);

        return redirect()->route('user.index')
                            ->with('success', 'Data User berhasil diupdate');

    }

    public function updatepassword (Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('user.index')
                            ->with('success', 'Data User berhasil diupdate');
    }

    public function updateprofile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $photo = $user->profile_photo_path;

        if ($request->hasFile('profile_photo_path')) {
            $photo = $request->file('profile_photo_path')->store('uploads/user');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_photo_path' => $photo,
        ]);

        return redirect()->route('dashboard')
                            ->with('success', 'Data User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
                            ->with('error', 'Data User berhasil dihapus');
    }
}
