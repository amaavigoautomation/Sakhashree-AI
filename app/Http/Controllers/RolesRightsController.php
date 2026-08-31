<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolesRight;
use App\Models\RoleRightMenuLink;
use App\Models\MenuLink;

class RolesRightsController extends Controller
{

    public function index()
    {

        $roles = RolesRight::with('menuLinks')->orderBy('active', 'desc')->paginate(20);

        return view('backend.rolesrights.index', compact('roles'));
    }

    public function create()
    {
        $menuLinks = MenuLink::all();
        return view('backend.rolesrights.create', compact( 'menuLinks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => ['required'],
            'role_description' => ['required'],
            // 'menuLinks' => ['required'] // Removed as requested
        ]);

        $role = RolesRight::create([
            'role_name' => $request->input('role_name'),
            'role_description' => $request->input('role_description'),
            'acive' => $request->input('acive'),
        ]);

        $menuLinks = $request->input('menuLinks');

        if (is_array($menuLinks)) {
            foreach ($menuLinks as $menuLinkId) {
                RoleRightMenuLink::create([
                    'role_id' => $role->id,
                    'menu_link_id' => $menuLinkId,
                ]);
            }
        }

        return redirect()->route('roles-rights.index')->with('success', 'RolesRight saved successfully!');
    }


    public function show($id)
    {
        $role = RolesRight::find($id);

        if (!$role) {
            return redirect()->route('roles-rights.index')->with('error', 'Role not found.');
        }

        return view('backend.rolesrights.show', compact('role'));
    }

    public function edit($id)
    {
        $role = RolesRight::findOrFail($id);
        $selectedMenuLinks = $role->menuLinks;
        $menuLinks = MenuLink::all();

        return view('backend.rolesrights.edit', compact( 'role', 'selectedMenuLinks', 'menuLinks'));
    }


    public function update(Request $request, $id)
    {
        $role = RolesRight::find($id);

        if (!$role) {
            return redirect()->route('rolesrights.index')->with('error', 'Role not found.');
        }
        $role->update([
            'role_name' => $request->input('role_name'),
            'role_description' => $request->input('role_description'),
            'acive' => $request->input('acive'),
       ]);

        $role->menuLinks()->sync($request->input('menuLinks'));

        return redirect()->route('roles-rights.index')->with('success', 'RolesRight updated successfully!');
    }

    public function destroy($id)
    {
        //
    }
}
