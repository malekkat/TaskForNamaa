<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Session;
use Silber\Bouncer\Bouncer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Translation\Tests\Writer\BackupDumper;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('user::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        if (!auth()->user()->can('content.create')){
            return view('user::pages.create');
        }else{
            return redirect(url('/user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' =>'required|email|unique:users'
        ]);
        $get_gr_name = $request->input('roles_id');
        if ( $get_gr_name ===  'super_admin'){
            $user = factory(User::class)->create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt('qwe123456'),
                'group_name'=>$request->input('roles_id')
            ]);
            $user->assign('super_admin');
            Session::flash('success', 'this new superAdmin is added !');
        }elseif($get_gr_name ===  'admin'){
            $user = factory(User::class)->create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt('qwe123456'),
                'group_name'=>$request->input('roles_id')
            ]);
            $user->assign('admin');
            Session::flash('success', 'this new Admin is added !');
        }else{
            $user = factory(User::class)->create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt('qwe123456'),
                'group_name'=>$request->input('roles_id')
            ]);
            //dd($user);
            $user->assign('user');
            Session::flash('success', 'this new User is added !');
        }
        return redirect(url('/user'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        try{
            $user = \App\User::findOrFail($id);
        }catch (ModelNotFoundException $exception){
            return redirect(url('/user'));
        }
        return view('user::pages.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' =>'required'
        ]);

        $user = User::find($id);

        //dd($user->assign($request->input('group_name')));
        $user->name =$request->input('name');
        $user->email =$request->input('email');
        $user->group_name =$request->input('group_name');

        $user->save();

        //Bouncer::assign($request->input('group_name'))->to($user);
        //dd($user);
       // $user->assign($request->input('group_name'));
        if(!auth()->user()->can('content.create')){
            return redirect(url('/user'));
        }else{
            return redirect(url('/user'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

    }
    public function gel_all_users(){
        if(!auth()->user()->can('content.create')){
            $get_group_name = Auth::user()->group_name;

            switch ($get_group_name){
                case 'super_admin':
                    $users = \App\User::all();
                    break;
                case 'admin':
                    $users = \App\User::where('group_name','user')->get();
                    //dd($users);
                    break;
            }
            return view('user::pages.showUsers')->with('users',$users);
        }else{
            return redirect(url('/user'));
        }
    }
    public function change_pass($id){
        $user = \App\User::findOrFail($id);
        return view('user::pages.changePass');
    }
    public function changed_pass(Request $request,$id){
        $request->validate([
            'password' => 'min:6',
            'confirm-pass' => 'required_with:password|same:password|min:6'
        ]);
        $user = User::findOrFail($id);
        $get_pass = $request->input('password');
        $user->password = bcrypt($get_pass);
        $user->save();
        return redirect(url('/user'));


    }
}
