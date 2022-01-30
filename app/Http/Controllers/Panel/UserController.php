<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\createUserRequest;
use App\Http\Requests\Panel\User\updateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(1);

        return view('panel.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  createUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createUserRequest $request)
    {

        $data = $request->validated();
        $data['password'] = Hash::make('password');

        User::create($data);
        $request->session()->flash('status', 'کاربر به درستی ایجاد شد');
        return redirect()->route('users.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('panel.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateUserRequest $request, User $user)
    {

        $user->update($request->validated());
        $request->session()->flash('status', 'اطلاعات کاربر به درستی ویرایش شد');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        dd('salam');
        $user->delete();
        $request->session()->flash('status', 'کاربر مدنظر به درستی حذف شد');
        return redirect()->route('users.index');
    }
}
