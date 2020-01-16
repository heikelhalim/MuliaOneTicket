<?php

namespace Kordy\Ticketit\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use Kordy\Ticketit\Helpers\LaravelVersion;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        //dd("Test Index User");
        // seconds expected for L5.8<=, minutes before that
        $time = LaravelVersion::min('5.8') ? 60*60 : 60;
        $users = User::all();

        return view('ticketit::admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ticketit::admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'contact_no'   => 'required',
            'password'   => 'required',
            'address'   => 'required',
        ]);

        

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email; 
        $user->password = Hash::make($request->password);

        if ($request->type == '1')
        {
                $user->ticketit_agent = true;

        }else if($request->type == '2')
        {
                $user->ticketit_outlet = true;
    
        }
        else if ($request->type == '3')
        {
            $user->ticketit_manager = true;
        }


        $user->address = $request->address;
        $user->contact_no = $request->contact_no;

        $user->save();

        Session::flash('user', trans('ticketit::lang.user-name-has-been-created', ['name' => $request->name]));

        \Cache::forget('ticketit::users');

        return redirect()->action('\Kordy\Ticketit\Controllers\UsersController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return trans('ticketit::lang.status-all-tickets-here');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('ticketit::admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'contact_no'   => 'required',
            'password'   => 'required',
            'address'   => 'required',
        ]);

        $user = User::findOrFail($id);
        
        $user->address = $request->address;
        $user->contact_no = $request->contact_no;
        $user->password = Hash::make($request->password);

        $user->save();

        Session::flash('user', 'Password updated.', ['name' => $user->name]);

 
        return redirect()->action('\Kordy\Ticketit\Controllers\UsersController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $name = $status->name;
        $status->delete();

        Session::flash('status', trans('ticketit::lang.status-name-has-been-deleted', ['name' => $name]));

        \Cache::forget('ticketit::statuses');

        return redirect()->action('\Kordy\Ticketit\Controllers\UsersController@index');
    }
}
