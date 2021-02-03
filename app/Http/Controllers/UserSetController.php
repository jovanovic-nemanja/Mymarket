<?php

namespace app\Http\Controllers;

/*
 * Antvel - Free Products Participants Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Http\Controllers\Controller;
use App\User;
use App\Business;
use Illuminate\Http\Request;
use DB;

class UserSetController extends Controller
{
        private $form_rules = [
            'email'                 => 'required|email|unique:users,email,',
            'nickname'              => 'required|max:255|unique:users,nickname,',
            'business_name'         => 'required|max:50|unique:users,nickname,',
            'password'              => 'required|string|min:6|max:18|',
        ];

    private $panel = [
        'left'   => ['width' => '2'],
        'center' => ['width' => '10'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $panel = $this->panel;
        $users = DB::table('users')
                ->join('businesses','users.id','=','businesses.user_id')
                ->where('role','=','business')
                ->orderBy('users.id','desc')
                ->select('users.*','businesses.state','businesses.creation_date')
                ->paginate(10);

        return view('user.set.index', compact('users','panel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.set.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $business = new Business;

        $v = \Validator::make($request->all(), $this->form_rules);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }

        $user->nickname = $request->input('nickname');
        $user->role = $request->input('role');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $business->business_name = $request->input('business_name');
        $business->state = $request->input('state');
        $business->creation_date = date('Y-m-d');
        $business->user_id = $user->id;

        $business->save();
        return $this->index();
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
        //
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
        $user = User::find($id);
        $business = Business::where('user_id','=',$id)->first();

        return view('user.set.edit', compact('user','business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $form_rule = [
            'email'                 => 'required|email|unique:users,email,'.$id,
            'nickname'              => 'required|max:255|unique:users,nickname,'.$id,
            'business_name'         => 'required|max:50|unique:businesses,business_name,'.$id.',user_id',
        ];

        $user = User::find($id);
        $business = Business::where('user_id','=',$id)->first();

        $v = \Validator::make($request->all(), $form_rule);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }

        $user->nickname = $request->input('nickname');
        $user->email = $request->input('email');
        $disabled_at = $request->input('disabled_at');

        $business->business_name = $request->input('business_name');
        $business->state = $request->input('state');

        if ($disabled_at!='false') {
          $user->disabled_at = NULL;
        }else{
          $user->disabled_at = date('Y-m-d');
        }

        $user->save();
        $business->save();

        return $this->index();

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function disabled(Request $request)
    {

        $id = $request->input('id');
        $user = User::find($id);

        if ($request->input('x')=='false') {
            $user->disabled_at = date('Y-m-d');
        }else{
            $user->disabled_at = NULL;
        }
        $user->save();

        return $this->index();
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
        //
    }


}
