<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = DB::table('users')->paginate(10);
      return view('user.index', ['users' => $users]);
      // $users = User::all()->toArray();
      // return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // print_r($request->input());      // debug data mode or dd($request);
      $this->validate($request, ['fname' => 'required|max:20', 'lname' => 'required|max:20']);
      $user = new User(
          [
          'fname' => $request->get('fname'),
          'lname' => $request->get('lname')
          ]
      );
      $user->save();
      return redirect()->route('user.index')->with('success', 'บันทึกข้อมูลเรียบร้อย');
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
    public function edit($id)
    {
      $user = User::find($id);
      return view('user.edit', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, ['fname' => 'required|max:20', 'lname' => 'required|max:20']);
      $user = User::find($id);
      $user->fname = $request->get('fname');
      $user->lname = $request->get('lname');
      $user->save();
      return redirect()->route('user.index')->with('success', 'อัปเดตข้อมูลเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('user.index')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}
