<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class FrontHowtoController extends Controller
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
        
        return view('front.products.index', $view);
    }
}
