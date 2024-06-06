<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::get();

        return response()->json(['data' => $roles], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $role = Role::create([
            'rol' => $request->rol,
            'activo' => 1,
        ]);
        // $variable = [];
        // foreach ($variable as $key => $value) {
        //     # code...
        //     Permission::create([
        //         'role_id' => $role->id,
        //         'module_id' => $value->id
        //     ]);
        // }

        return response()->json(['data' => $role], 200);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $role = Role::find($id);
        $role->rol = $request->rol;
        $role->save();

        return response()->json(['data' => $role], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $role = Role::find($id);
        $role->activo = '0';
        $role->save();

        return response()->json(['data'=> $role], 200);
    }
}
