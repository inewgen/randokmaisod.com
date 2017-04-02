<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class FrontContactController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        $data    = Input::all();
        $page    = array_get($data, 'page', '1');
        $perpage = array_get($data, 'perpage', '16');
        $order   = array_get($data, 'order', 'updated_at');
        $sort    = array_get($data, 'sort', 'desc');

        // Menu
        $params  = [ 'user_id' => 1, 'status' => 1, 'order' => 'position', 'sort' => 'asc'];
        $results = requestClient('GET', 'navigations', $params);
        $menus   = array_get($results, 'data.record', []);

        // Products
        $params  = [
            'user_id' => 1,
            'status'  => 1,
            'page'    => $page,
            'perpage' => $perpage,
            'order'   => $order,
            'sort'    => $sort
        ];

        $results    = requestClient('GET', 'products', $params);
        $products   = array_get($results, 'data.record', []);
        $pagination = getPagination($page, $perpage, array_get($results, 'data.pagination.total', 0), 'products');

        // Category
        $params  = [
            'user_id' => 1,
            'status'  => 1,
            'type'    => 4,
            'order'   => 'position',
            'sort'    => 'asc'
        ];
        $results    = requestClient('GET', 'categories', $params);
        $categories = array_get($results, 'data.record', []);

        $view = [
            'data'       => $data,
            'menus'      => $menus,
            'products'   => $products,
            'categories' => $categories,
            'pagination' => $pagination
        ];
        
        return view('front.contact.index', $view);
    }

    public function postAddContact()
    {
        $data = Input::all();

        // Validator request
        $rules = array(
            'name'    => 'required',
            'email'   => 'required',
            'message' => 'required',
        );

        $referer = array_get($data, 'referer', '');
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect('contact')->with('status', 'ขออภัยค่ะ ลูกค้ากรอกข้อมูลไม่ถูกต้องค่ะ');
        }

        $ip = $_SERVER['REMOTE_ADDR'];


        // Parameters
        $parameters_allow = array(
            'name'    => '',
            'email'   => '',
            'mobile'  => '',
            'message' => '',
            'user_id' => '',
            'status'  => '1', // 0=Closed,1=New,2=Read,3=Active
            'ip'      => $ip,
            'url'     => $referer,
        );

        $parameters = array();
        foreach ($parameters_allow as $key => $val) {
            $parameters[$key] = array_get($data, $key, $val);
        }

        $results = requestClient('POST', 'contacts', $parameters);

        if (array_get($results, 'status_code', false) != '0') {
            return redirect('contact')->with('status', 'ขออภัยค่ะ ไม่สามารถส่งข้อความของลูกค้าได้ในขณะนี้');
        }

        return redirect('contact')->with('status', 'ส่งข้อความของลูกค้าเรียบร้อยแล้วค่ะ');
    }
}
