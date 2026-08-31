<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\RolesRight;
use App\Models\AdminType;

class UsersController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('backend.users.changepassword');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'The current password is incorrect.']);
        }

        if ($request->new_password !== $request->confirm_password) {
            return back()->withErrors(['confirm_password' => 'The new password and confirm password do not match.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::flash('success', 'Password changed successfully!');

        return redirect()->back()->with('success','Password changed successfully!');
    }


    public function index(Request $request)
    {
        
        $adminTypeId = Auth::user()->admin_type_id;

        if ($adminTypeId == 1) {
               return redirect()->back()->with('error', ' Not Authorized for This Section.');
        }

        $usersQuery = User::with(['roles', 'adminTypes']);
        if ($request->filled('name')) {
            $usersQuery->where('name', $request->name);
        }

        
        if ($request->filled('status')) {
            $status = $request->status === 'active' ? 1 : 0;
            $usersQuery->where('active', $status);
        }
        $users = $usersQuery->orderBy('active', 'desc')->paginate(20);
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];
        $names = User::select('name')->distinct()->pluck('name');

        return view('backend.users.index', compact('users', 'statuses', 'names'));


    }

    public function create()
    {
        $rolesRights = RolesRight::all()->where('active', true);
        $adminTypes = AdminType::all()->where('active', true);

        return view('backend.users.create', compact('rolesRights', 'adminTypes'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'admin_type_id' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $roleId = 1;
        $adminTypeId = $request->input('admin_type_id');
        $role = RolesRight::find($roleId);
        $adminTypes = AdminType::find($adminTypeId);
        if (!empty($role)) {
            $role_id = $role->id;
        }

        if (!empty($adminTypes)) {
            $admin_type_id = $adminTypes->id;
        }

        $users = User::create([
            'role_id' => $role_id,
            'admin_type_id' => $admin_type_id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'contact_no' => $request->input('contact_no'),
            'alternate_no' => $request->input('alternate_no'),
            'its_seo_users' => $request->input('its_seo_users'),
            'its_report_manager' => $request->input('its_report_manager'),
            'active' => $request->input('active'),
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folder = 'images/users/image/' . $users->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $users->image = $image->getClientOriginalName();
        }
        $users->save();

        return redirect()->route('users.index')->with('success', 'Users saved successfully!');
    }


    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'users not found.');
        }


        return view('backend.users.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $rolesRights = RolesRight::all()->where('active', true);
        $adminTypes = AdminType::all()->where('active', true);

        return view('backend.users.edit', compact('user', 'rolesRights', 'adminTypes'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        $roleId = 1;
        $adminTypeId = $request->input('admin_type_id');

        $role = RolesRight::find($roleId);
        $adminTypes = AdminType::find($adminTypeId);

        if (!empty($role)) {
            $role_id = $role->id;
        }
        if (!empty($adminTypes)) {
            $admin_type_id = $adminTypes->id;
        }

        $user->update([
            'role_id' => $role_id,
            'admin_type_id' => $admin_type_id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'alternate_no' => $request->input('alternate_no'),
            'its_seo_users' => $request->input('its_seo_users'),
            'its_report_manager' => $request->input('its_report_manager'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folder = 'images/users/image/' . $user->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $user->image = $image->getClientOriginalName();
        }
        $user->save();

        return redirect()->route('users.index')->with('success', 'Users updated successfully!');
    }

    public function destroy($id)
    {
        //
    }
}
