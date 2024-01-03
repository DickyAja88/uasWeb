<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Status\jsonResponseStatus;
use Illuminate\Http\Request;
use App\Http\Resources\v1\UserResource;
use App\Http\Resources\v1\UserCollection;
use App\Filter\v1\UserFilter;
use App\Http\Requests\v1\StoreUserRequest;
use App\Http\Requests\v1\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new UserFilter();
        $filterItems = $filter->transform($request);//to filter query jadi bisa filter pake operator

        $includeRoles = $request->query('includeRoles');

        $users = User::where($filterItems);

        if($includeRoles){
            $users = $users->with('roles');
        }
        
        
        return new UserCollection(User::where($filterItems)->paginate());
        
    }

    /**~
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try{
            new UserResource(User::create($request->all()));
            return (new jsonResponseStatus(true, 200, 'Berhasil Mendaftar'))->jsonResponse();
        }catch(\Exception $e){
            return (new jsonResponseStatus(false, 400, 'Gagal Mendaftar'))->jsonResponse();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $includeRoles = request()->query('includeRoles');
        if($includeRoles){
            return new UserResource($user->loadMissing('roles'));
        }
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try{
            $user->update($request->all());
            return (new jsonResponseStatus(true, 200, 'Berhasil Update User'))->jsonResponse();
        }catch(\Exception $e){
            return (new jsonResponseStatus(false, 400, 'Gagal Update User'))->jsonResponse();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();
            return (new jsonResponseStatus(true, 200, 'Berhasil Menghapus User'))->jsonResponse();
        }catch(\Exception $e){
            return (new jsonResponseStatus(false, 400, 'Gagal Menghapus User'))->jsonResponse();
        }
        
    }
}
