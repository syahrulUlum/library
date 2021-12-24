<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member');
    }

    public function api(Request $request)
    {
        if ($request->gender) {
            $members = Member::where('gender', $request->gender)->get();
        } else {
            $members = Member::all();
        };
        $datatables = datatables()->of($members)->addIndexColumn();

        return $datatables->make(true);
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
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:publishers,email',
            'phone_number' => 'required|max:15',
            'address' => 'required',
        ], [
            'name.required' => 'The Member Name field is required',
            'gender.required' => 'The Gender field is required',
            'email.required' => 'The Email field is required',
            'email.unique' => 'The Email has already been taken',
            'phone_number.required' => 'The Phone Number field is required',
            'phone_number.max' => 'The Phone Number field max 15',
        ]);

        Member::create($request->all());

        return redirect('members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone_number' => 'required|max:15',
            'address' => 'required',
        ], [
            'name.required' => 'The Member Name field is required',
            'gender.required' => 'The Gender field is required',
            'email.required' => 'The Email field is required',
            'phone_number.required' => 'The Phone Number field is required',
            'phone_number.max' => 'The Phone Number field max 15',
        ]);

        $member->update($request->all());

        return redirect('members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
    }

    public function test_spatie()
    {
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'member page']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $user = auth()->user();
        // $user->assignRole('admin');
        // return $user;
    }
}
