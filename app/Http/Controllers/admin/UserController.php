<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('status', '<>', 't')->get();

        return view('admin.user.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'userName' => 'required',
            'userPassword' => 'required',
            'usName' => 'required',
            'usLastName' => 'required',
            'usPhone' => 'required',
            'usMail' => 'required',
            'usStatus' => 'required'
        ]);

        $user = User::create([
            'uname' => $request->userName,
            'pass' => $request->userPassword,
            'mail' => $request->usMail,
            'mpno' => $request->usPhone,
            'fname' => $request->usName,
            'lname' => $request->usLastName,
            'status' => $request->usStatus
        ]);

        $user->save();

        return redirect()->route('admin.user.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        // Gelen form verilerinin dolu olup olmadığına bakar dolu ise aşağıdaki işlemi gerçekleştirir. Değil ise geriye döner aşağıdaki işlemleri gerçekleştirmeden.
        $request->validate([
            'userName' => 'required',
            'userPassword' => 'required',
            'usName' => 'required',
            'usLastName' => 'required',
            'usPhone' => 'required',
            'usMail' => 'required',
            'usStatus' => 'required'
        ]);

        User::where('id', $id)->update([
            'uname' => $request->userName,
            'pass' => $request->userPassword,
            'mail' => $request->usMail,
            'mpno' => $request->usPhone,
            'fname' => $request->usName,
            'lname' => $request->usLastName,
            'status' => $request->usStatus
        ]);

        return redirect()->route('admin.user.edit',compact('id'))->with('status', 'Güncelleme İşlemi Başarılı Bir Şekilde Gerçekleştirildi...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => 't'
        ]);

        return redirect()->back();
    }
}
