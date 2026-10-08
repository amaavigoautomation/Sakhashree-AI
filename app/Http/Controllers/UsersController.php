<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\RolesRight;
use App\Models\AdminType;
use App\Models\Country;

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
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'The current password is incorrect.'
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::flash('success', 'Password changed successfully!');

        return redirect()
            ->back()
            ->with('success', 'Password changed successfully!');
    }

    public function index(Request $request)
    {
        $adminTypeId = Auth::user()->admin_type_id;

        if ($adminTypeId == 1) {
            return redirect()
                ->back()
                ->with('error', 'Not Authorized for This Section.');
        }

        $usersQuery = User::with(['roles', 'adminTypes']);

        if ($request->filled('name')) {
            $usersQuery->where('name', $request->name);
        }

        if ($request->filled('status')) {
            $status = $request->status === 'active' ? 1 : 0;
            $usersQuery->where('active', $status);
        }

        $users = $usersQuery
            ->orderBy('active', 'desc')
            ->paginate(20);

        $statuses = [
            'active' => 'Active',
            'inactive' => 'Inactive'
        ];

        $names = User::select('name')
            ->distinct()
            ->pluck('name');

        return view(
            'backend.users.index',
            compact('users', 'statuses', 'names')
        );
    }

    public function create()
    {
        $rolesRights = RolesRight::all()->where('active', true);
        $adminTypes = AdminType::all()->where('active', true);
        $countries = Country::where('active', true)->get();

        return view(
            'backend.users.create',
            compact('rolesRights', 'adminTypes','countries')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'min:8',
            ],

            'contact_no' => [
                'required',
                'digits_between:1,12',
            ],

            'country_id' => [
                'required',
                'exists:countries,id',
            ],

            'active' => [
                'required',
                'boolean',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $roleId = 1;
        $adminTypeId = 2;

        $role = RolesRight::find($roleId);
        $adminTypes = AdminType::find($adminTypeId);

        if (!$role) {
            return back()
                ->withInput()
                ->withErrors([
                    'role_id' => 'Default role not found.'
                ]);
        }

        if (!$adminTypes) {
            return back()
                ->withInput()
                ->withErrors([
                    'admin_type_id' => 'Super Admin type not found.'
                ]);
        }

        $users = User::create([
            'role_id' => $role->id,
            'admin_type_id' => $adminTypes->id,
            'name' => $request->input('name'),
            'country_id' => $request->input('country_id'),
            'calling_code' => $request->input('calling_code'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'contact_no' => $request->input('contact_no'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $folder = 'images/users/image/' . $users->id;

            $image->move(
                public_path($folder),
                $image->getClientOriginalName()
            );

            $users->image = $image->getClientOriginalName();
            $users->save();
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'User saved successfully!');
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()
                ->route('users.index')
                ->with('error', 'Users not found.');
        }

        return view('backend.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $rolesRights = RolesRight::all()->where('active', true);
        $adminTypes = AdminType::all()->where('active', true);

        $countries = Country::where('active', true)->get();

        return view(
            'backend.users.edit',
            compact('user', 'rolesRights', 'adminTypes', 'countries')
        );
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()
                ->route('users.index')
                ->with('error', 'User not found.');
        }

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],

            'contact_no' => [
                'required',
                'digits_between:1,12',
            ],

            'country_id' => [
                'required',
                'exists:countries,id',
            ],

            'active' => [
                'required',
                'boolean',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
                'dimensions:width=64,height=64',
            ],
        ]);

        $roleId = 1;
        $adminTypeId = 2;

        $role = RolesRight::find($roleId);
        $adminTypes = AdminType::find($adminTypeId);

        if (!$role) {
            return back()
                ->withInput()
                ->withErrors([
                    'role_id' => 'Default role not found.'
                ]);
        }

        if (!$adminTypes) {
            return back()
                ->withInput()
                ->withErrors([
                    'admin_type_id' => 'Super Admin type not found.'
                ]);
        }

        $user->update([
            'role_id' => $role->id,
            'admin_type_id' => $adminTypes->id,
            'name' => $request->input('name'),
            'country_id' => $request->input('country_id'),
            'calling_code' => $request->input('calling_code'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $folder = 'images/users/image/' . $user->id;

            $image->move(
                public_path($folder),
                $image->getClientOriginalName()
            );

            $user->image = $image->getClientOriginalName();
            $user->save();
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully!');
    }
}
