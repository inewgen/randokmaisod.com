<?php

namespace App\Http\Controllers;

use App\Menu as Menu;
use App\Slider as Slider;
use App\Http\Controllers\Controller;

class FrontHomeController extends Controller
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

        // Banners
        $results = requestClient('GET', 'banners', $params);
        $banners = array_get($results, 'data.record', []);

        // Highlight products
        $params['type'] = '2';
        $results        = requestClient('GET', 'products', $params);
        $products_h     = array_get($results, 'data.record', []);

        // Normal products
        $params['type']    = '1';
        $params['perpage'] = '16';
        $results           = requestClient('GET', 'products', $params);
        $products          = array_get($results, 'data.record', []);

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

        // Shop settings
        $params       = [];
        $results      = requestClient('GET', 'shopsettings', $params);
        $shopsettings = array_get($results, 'data.record', []);

        // Mapping Category
        $settings = [];
        foreach ($shopsettings as $shopsetting) {
            $settings[array_get($shopsetting, 'key', '')] = $shopsetting;
        }

        $view = [
            'menus'      => $menus,
            'banners'    => $banners,
            'products_h' => $products_h,
            'products'   => $products,
            'categories' => $categories,
            'settings'   => $settings,
        ];

        return view('front.home.index', $view);
    }
}
