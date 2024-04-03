<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAddRequestForm;
use App\Http\Requests\User\UserEditRequestForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usersDetailsData['usersDetailsData'] = User::get();
        return view('user.index', $usersDetailsData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserAddRequestForm $requestDetailData)
    {
        $requestDetailData['password'] = Hash::make($requestDetailData['password']);
        $requestDetailData['status'] = 'verified';
        User::create($requestDetailData->except('_token'));
        return redirect()->route('users.index')->with('message', 'Successfully Added New User');

    }


    public function edit(string $userDetail)
    {
        $userDetailData['userDetailData'] = User::findOrFail($userDetail);

        return view('user.edit', $userDetailData);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserEditRequestForm $userValidData, User $user)
    {
        if ($userValidData['password']){
            $user->update($userValidData->validated());
        }else{
            $user->update($userValidData->except(['_token', 'password']));
        }

        return redirect()->route('users.index')->with('message', 'Successfully Updated User');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $userDataDetail)
    {
        $userDetailData = User::with('items')->findOrFail($userDataDetail);

        if($userDetailData->items){
            $userDetailData->items()->delete();
        }

        $userDetailData->delete();
        return redirect()->route('users.index')->with('message', 'Successfully Deleted User');

    }
}
