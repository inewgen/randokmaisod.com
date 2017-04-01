<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class FrontProductController extends Controller
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

        if ($category_id = array_get($data, 'catid', false)) {
            $params['category_id'] = $category_id;
        }

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

        // Mapping Category
        $categories_map = [];
        foreach ($categories as $category) {
            $categories_map[array_get($category, 'id', '')] = $category;
        }

        $view = [
            'data'           => $data,
            'menus'          => $menus,
            'products'       => $products,
            'categories'     => $categories,
            'categories_map' => $categories_map,
            'pagination'     => $pagination
        ];
        
        return view('front.products.index', $view);
    }

    public function show($id)
    {
        // Menu
        $params  = [ 'user_id' => 1, 'status' => 1, 'order' => 'position', 'sort' => 'asc'];
        $results = requestClient('GET', 'navigations', $params);
        $menus   = array_get($results, 'data.record', []);

        // Normal products
        $results = requestClient('GET', 'products/' . $id, $params);
        $products = array_get($results, 'data.record', []);

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
            'menus'      => $menus,
            'products'   => $products,
            'categories' => $categories,
        ];

        return view('front.products.show', $view);
    }
}
