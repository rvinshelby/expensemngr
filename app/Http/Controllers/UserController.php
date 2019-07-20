<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all();
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
    public function store(CreateUserRequest $request)
    {
        if($request->validated()) {
            $user = new User();
            $user->fill($request->all());
            $user->save();

            return redirect()->route('users.index')
                             ->with('status', [
                                'msg'       =>  'User Successfully Created.',
                                'variant'   =>  'success',
                             ]);
        }

        return redirect()->back()
                         ->withErrors('status', [
                            'msg'       =>  'Something went wrong.',
                            'variant'   =>  'danger',
                         ])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if($request->validated()) {
            $user->fill($request->all());
            $user->save();

            return redirect()->route('users.index')
                             ->with('status', [
                                'msg'       =>  'User Successfully Updated.',
                                'variant'   =>  'success',
                             ]);
        }

        return redirect()->back()
                         ->withErrors('status', [
                            'msg'       =>  'Something went wrong.',
                            'variant'   =>  'danger',
                         ])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
                         ->with('status', [
                            'msg'       =>  'User Removed Successfully.',
                            'variant'   =>  'success',
                         ]);
    }
}
