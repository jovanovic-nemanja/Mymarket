<?php

namespace app\Http\Controllers;

/*
 * Antvel - Home Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\FreeProduct;
use App\Helpers\productsHelper;
use App\Http\Controllers\Controller;
use App\Order;
use App\Company;
use App\Product;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $panel = [
            'center' => [
                'width' => 10,
            ],
            'left' => [
                'width' => 2,
                'class' => 'home-no-padding',
            ],
        ];

        $helperProd = new productsHelper();

        $carousel = $helperProd->suggest('carousel');
        $viewed = $helperProd->suggest('viewed', 8);
        $categories = $helperProd->suggest('categories');
        $purchased = $helperProd->suggest('purchased');

        $suggestion = [
            'carousel'   => $carousel,
            'viewed'     => $viewed,
            'categories' => $categories,
            'purchased'  => $purchased,
        ];

        $helperProd->resetHaystack(); //reseting session id validator

        $events = [];
        if (config('app.offering_free_products')) {
            $events = FreeProduct::getNextEvents([
                'id',
                'description',
                'min_participants',
                'max_participants',
                'participation_cost',
                'start_date',
                'end_date',
            ], 4, date('Y-m-d'));
        }

        $tagsCloud = ProductsController::getTopRated(0, 20, true);
        $labels = ProductsController::getTopRated(0, 1, true);

        $allWishes = '';
        $user = \Auth::user();
        if ($user) {
            $allWishes = Order::ofType('wishlist')->where('user_id', $user->id)->where('description', '<>', '')->get();
        }

        $i = 0; //carousel implementation
        $jumbotronClasses = ['jumbotron-box-left', 'jumbotron-box-right']; //carousel implementation

        $banner = [
            '/img/banner/01.png',
            '/img/banner/02.png',
            '/img/banner/03.png',
            '/img/banner/04.png',
            '/img/banner/05.png'
        ];
        $lbpic = Company::select('lbpic')->first();
        if ($lbpic!='') {
            $banner = explode(',',$lbpic->lbpic);
        }
        // $this->createTags();

        $lcs = $this->classLc();//楼层分类
        $navs = $this->classProduct();//分类级联菜单

        //新品推荐20
        $newProduct = DB::table('products')->orderBy('created_at','desc')->limit(20)->get();

        //热卖推荐20
        $sells = DB::table('products')
                ->join('order_details','products.id','=','order_details.product_id')
                ->select('order_details.product_id','products.*',DB::raw('count(*) as num'))
                ->groupBy('order_details.product_id')
                ->orderBy('num','desc')
                ->limit(20)->get();

        return view('szy.index', compact('banner','newProduct','navs','labels','sells','lcs'));

        // return view('szy.index', compact('panel', 'suggestion', 'allWishes', 'events', 'tagsCloud', 'jumbotronClasses', 'i', 'banner'));
    }


    //分类级联数据
    static function classProduct(){
        $categories = DB::table('categories')
                ->whereNull('categories.category_id')
                ->orderBy('created_at','desc');
        $class = $categories->limit(6)->get();
        $navs = array();
        if (isset($class[0]->id)) {
            foreach ($class as $value) {
                $navs[$value->name][0] = $value;
                $navs[$value->name][1] = DB::table('categories')->where('category_id',$value->id)->orderBy('created_at','desc')->limit(3)->get();
                $navs[$value->name][2] = DB::table('categories')->where('category_id',$value->id)->orderBy('created_at','desc')->get();
            } 
        }
        return $navs;
    }
    //
    public function classLc(){
        $categories = DB::table('categories')
                ->whereNull('categories.category_id')
                ->orderBy('created_at','desc');
        $class = $categories->limit(5)->get();
        $lcs = array();
        if (isset($class[0]->id)) {
            foreach ($class as $value) {
                $lcs[$value->name][0] = $value;
                $lcs[$value->name][1] = DB::table('categories')->where('category_id',$value->id)
                ->orderBy('created_at','desc')->select('categories.id','categories.name')
                ->limit(3)->get();
                $lcs[$value->name][2] = DB::table('categories')
                ->join('products','categories.id','=','products.category_id')
                ->where('categories.category_id',$value->id)
                ->orderBy('products.created_at','desc')
                ->select('products.*')
                ->limit(8)->get();
            } 
        }
        return $lcs;
    }

    private function createTags()
    {
        $product = Product::select(['id', 'name'])->get();

        foreach ($product as $value) {
            $prod = Product::find($value->id);

            $prod->tags = str_replace(' ', ',', $value->name);

            $prod->save();
        }
    }
}
