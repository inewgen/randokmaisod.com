<?php

namespace App\Http\Controllers;

use App\Menu as Menu;
use App\Slider as Slider;
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

        $results    = requestClient('GET', 'products', $params);
        $products   = array_get($results, 'data.record', []);
        $pagination = self::getPagination($page, $perpage, array_get($results, 'data.pagination.total', 0), 'products');

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

    public function getPagination($page = 1, $perpage = 10, $total = 0, $path = '')
    {
        $lastPage = ceil($total / $perpage);
        $url = url($path);

        $pagination = [
            'firstPage' => [
                'url'    => $url,
                'active' => ($page == 1 ? 0 : 1),
            ],
            'lastPage'  => [
                'url'    => $url . '?page=' . $lastPage,
                'active' => ($page == $lastPage ? 0 : 1),
            ],
        ];

        if ($lastPage > 1) {
            for ($i = 1; $i <= $lastPage; $i++) {
                $url = ($i == 1 ? $url : $url . '?page=' . $i);
                $pagination['midPage'][$i] = [
                    'url' => $url,
                    'active' => ($page == $i ? 1 : 0),
                ];
            }
        }

        return $pagination;
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
