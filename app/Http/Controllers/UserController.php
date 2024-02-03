<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DataTables;
use ManagesCRUD;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select(['id', 'name', 'email', 'role'])->orderBy('id', 'desc')->get();

        return view('pages.users.index', [
            'title' => 'Users',
            'active' => 'Users',
            'users' => $users, // Add this line to pass $users to the view
        ]);
    }

    public function data()
    {
        $users = User::select(['id', 'name', 'email', 'role'])->orderBy('id', 'desc')->get();

        return datatables()
            ->of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                return '
                    <div class="btn-group">
                        <button type="button" onclick="editForm(`' . route('users.update', $user->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                        <button type="button" onclick="deleteData(`' . route('users.destroy', $user->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                    </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        //
    }

    // public function store(Request $request)
    // {
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->save();

    //     return response()->json('Data berhasil disimpan', 200);
    // }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return response()->json(['message' => 'Data berhasil disimpan']);
    }


    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $title = 'Edit User';
        $active = 'Users'; // Tambahkan ini sesuai dengan halaman yang sedang diakses
        return view('pages.users.edit', compact('user', 'title', 'active'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        // Periksa apakah password diisi sebelum mengubahnya
        if ($request->has('password') && $request->password != "") {
            $user->password = bcrypt($request->password);
        }

        $user->update();

        return redirect()->route('users.edit', ['user' => $user->id])
            ->with('success', 'Data berhasil disimpan');
    }



    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return response(null, 204);
    }
}