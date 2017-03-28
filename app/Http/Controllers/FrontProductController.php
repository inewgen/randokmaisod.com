<?php

namespace App\Http\Controllers;

use App\Menu as Menu;
use App\Slider as Slider;
use App\Http\Controllers\Controller;

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
        // Menu
        $params  = [ 'user_id' => 1, 'status' => 1, 'order' => 'position', 'sort' => 'asc'];
        $results = requestClient('GET', 'navigations', $params);
        $menus   = array_get($results, 'data.record', []);

        // Normal products
        $results = requestClient('GET', 'products', $params);
        $products = array_get($results, 'data.record', []);

        $view = [
            'menus'      => $menus,
            'products'   => $products,
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

        $view = [
            'menus'      => $menus,
            'products'   => $products,
        ];

        return view('front.products.show', $view);
    }
}
