<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\MerchantRequest;
use App\Http\Requests\MerchantUpdateRequest;


class AdminMerchantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $merchants = User::where('role','merchant')->get();

        return view('admin.merchants.index', compact('merchants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.operation.merchants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MerchantRequest $request)
    {
        //
        $user = User::create([
            'uuid' => Uuid::uuid4()->toString(),
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'role'=>'merchant',
            'password' => Hash::make($request->password),
        ]);
        $msgData = [

            'message' => 'Account created successfully',
        ];
        return redirect()->route('merchants.index');
        // if($user)
        // {
        //     return view('admin.merchants.index',$msgData);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $merchant)
    {
        //
        return view('admin.merchants.show', compact('merchant'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $merchant)
    {
        //
        return view('admin.operation.merchants.update',compact('merchant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MerchantUpdateRequest $request, User $merchant)
    {
        dd($merchant);
        $merchant->update($request->validated());

        return redirect()->route('merchants.show', $merchant)
            ->with('success', __('Merchant updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $merchant)
    {
        $merchant->delete();
        return redirect()->route('merchants.index')->with('success', 'Merchant deleted successfully');
    }


}
