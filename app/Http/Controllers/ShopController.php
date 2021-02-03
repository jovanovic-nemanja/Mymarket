<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Business;
use Illuminate\Http\Request;
use DB;

class ShopController extends Controller
{


    public function index($id,Request $request)
    {
    	$request->flash();

    	//商铺信息
        $business = Business::where('user_id',$id)->first();

        $search = $request->input('search');
        $order = $request->input('order');
        $ade = $request->input('ade');

        //商铺商品查询
        $products = DB::table('products')->where('products.user_id','=',$id);

        //排序字段
        if (!empty($order)) {
        	if ($order == 'all') {
        		$products = $products->orderBy('products.id',$ade);
        	}
        	if ($order == 'date') {
 
        		$products = $products->orderBy('products.created_at',$ade);
        	}
        	if ($order == 'price') {
        		$products = $products->orderBy('products.price',$ade);
        	}
        	if ($order == 'sell') {
        		$products = $products
        		->join('order_details','products.id','=','order_details.product_id')
		        ->select('order_details.product_id','products.*',DB::raw('count(*) as num'))
		        ->groupBy('order_details.product_id')
		        ->orderBy('num',$ade);
        	}
        }else{
        	$products = $products->orderBy('id','desc');
			$order = 'all';
			$ade = 'desc';
        }
        //模糊查询
        if (!empty($search)) {
        	$products = $products->where('products.name', 'like', '%'.$search.'%');
        }

        //获取字段数据（销售区分select）
        if (!empty($order) && $order=='sell') {
        	$products = $products->paginate(20);
        }else{
        	$products = $products->select('products.*')->paginate(20);
        }

        //店家推荐
        $pushs = DB::table('products')
	        ->join('order_details','products.id','=','order_details.product_id')
	        ->select('order_details.product_id','products.*',DB::raw('count(*) as num'))
	        ->groupBy('order_details.product_id')
	        ->orderBy('num','desc')
	        // ->orderBy('created_at','desc')
	        ->where('products.user_id','=',$id)
	        ->limit(5)
	        ->get();

        return view('szy.shop', compact('business','products','pushs','order','ade','id'));
    }

}
