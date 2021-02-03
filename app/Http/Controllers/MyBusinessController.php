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
use Illuminate\Support\Facades\Auth;
class MyBusinessController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Business::where('user_id','=',Auth::user()->id)->first();
        $lbs = $user->lbpic;
        $lbArr = array();
        if ($lbs!='') {
            $lbArr = explode(',', $lbs);
        }
        $user->lbs=$lbArr;

        return view('user.business.mybusiness', compact('user'));
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
            'business_name'         => 'required|max:50|unique:businesses,business_name,'.$id.',user_id',
            'email'                 => 'email|max:50',
            'range'                 => 'max:255',
            'person'                => 'max:50',
            'address'               => 'max:200',
            'phone'                 => 'max:50',
            'fax'                   => 'max:50',
            'qq'                    => 'max:255',
            'referral'              => 'max:2000',
            'pay'                   => 'max:2000',
            'delivery'              => 'max:2000',
        ];

        $business = Business::where('user_id','=',$id)->first();

        $v = \Validator::make($request->all(), $form_rule);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }

        // return $this->upload($request,'logo');

        $logo = $this->upload($request,'logo');
        if ($logo!='false') {
            if (file_exists($business->logo)) {
                unlink($business->logo);
            }
            $business->logo = $logo;
        }

        $dpphoto = $this->upload($request,'dpphoto');
        if ($dpphoto!='false') {
            if (file_exists($business->dpphoto)) {
                unlink($business->dpphoto);
            }
            $business->dpphoto = $dpphoto;
        }

        $lbs = $this->upload($request,'lbphoto');

        if ($lbs !='false') {
            $lbss = array(0=>'',1=>'',2=>'',3=>'',4=>'');
            if (!empty($business->lbpic)) {
                $lbss = explode(',', $business->lbpic);
            }
            foreach ($lbs as $key => $value) {
                if ($value!='') {
                    if (isset($lbss[$key])) {
                        if (file_exists($lbss[$key])) {
                            unlink($lbss[$key]);
                        }
                    }
                   $lbss[$key] = $value;
                }
            }
            $business->lbpic = implode(',',$lbss);
        }

        $business->business_name = $request->input('business_name');
        $business->email = $request->input('email');
        $business->range = $request->input('range');
        $business->person = $request->input('person');
        $business->address = $request->input('address');
        $business->phone = $request->input('phone');
        $business->fax = $request->input('fax');
        $business->qq = $request->input('qq');
        $business->referral = $request->input('referral');
        $business->pay = $request->input('pay');
        $business->delivery = $request->input('delivery');

        $business->save();
        return redirect()->action('MyBusinessController@index');
    }

    //图片异步上传
    public function upload(Request $request,$name)
    {   
        $path = 'upload/business/';
        $filename = 'BUSINESS_LB'.time().rand(1,10000);
        $file = $request->file($name);

        if ($request->hasFile($name)) {
            if ($name =='lbphoto') {
                foreach($request->file($name) as $k=>$f) {
                    $Extension = $f->getClientOriginalExtension();
                    $filename = 'BUSINESS_LB'.time().rand(1,10000);
                    $f->move($path, $filename.'.'.$Extension);
                    $arr[$k] = $path.$filename.'.'.$Extension; //原图路径加名
                }  
                return $arr;
            }else{
                $Extension = $file->getClientOriginalExtension();
                $file->move($path, $filename.'.'.$Extension);
                return $path.$filename.'.'.$Extension; //原图路径加名称
            }
        }else{
            return 'false';
        }
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
