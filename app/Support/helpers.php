<?php

if (!function_exists('getPagination')) {
    function getPagination($page = 1, $perpage = 10, $total = 0, $path = '')
    {
        $firstItem  = ($page * $perpage) - ($perpage - 1);
        $lastItem   = $firstItem + $perpage - 1;
        $lastPage   = ceil($total / $perpage);
        $url        = url($path);
        $pagination = [];

        $pagination['display'] = [
            'first' => ($firstItem > $total ? $total : $firstItem),
            'last'  => ($lastItem > $total ? $total : $lastItem),
            'total' => $total
        ];

        if ($lastPage > 1) {
            $pagination['firstPage'] = [
                'url'    => ($page == 1 ? '' : $url),
                'active' => ($page == 1 ? 0 : 1),
            ];

            $pagination['lastPage']  = [
                'url'    => $url . '?page=' . $lastPage,
                'active' => ($page == $lastPage ? 0 : 1),
            ];

            for ($i = 1; $i <= $lastPage; $i++) {
                $url = ($i == 1 ? $url : $url . '?page=' . $i);
                $pagination['midPage'][$i] = [
                    'url'    => ($page == $i ? $url : ''),
                    'active' => ($page == $i ? 1 : 0),
                ];
            }
        }

        return $pagination;
    }
}

if (!function_exists('getImageUrl')) {
    // img|image, default|user_id, array(), 100, 100
    function getImageUrl($image, $w = 200, $h = 200, $name = '')
    {
        $type = 'image';
        $section = array_get($image, 'user_id', '');
        $code = array_get($image, 'code', '');
        $extension = array_get($image, 'extension', '');
        $name = (!empty($name) ? $name : array_get($image, 'name', 'img.jpg'));

        if (empty($type) || empty($section) || empty($code) || empty($extension)) {
            return false;
        }

        $siamits_res = env('RES_URL', 'http://res.ranbandokmaisod.com');

        if ($type == 'img') {
            return $siamits_res . '/img/' . $section . '/' . $code . '/' . $extension . '/' . $w . '/' . $h .'/'.$name;
        }
        $user_id = $section;

        return $siamits_res . '/image/' . $user_id . '/' . $code . '/' . $extension . '/' . $w . '/' . $h.'/'.$name;
    }
}

if (!function_exists('requestClient')) {
    function requestClient($method, $path, $params = false)
    {
        $base_uri = env('API_URL', 'http://apis.ranbandokmaisod.com/api');
        $client = new GuzzleHttp\Client();

        if ($method == 'GET') {
            $params = $params ? http_build_query($params) : false;
            $res    = $client->request($method, $base_uri . '/' . $path . ($params ? '?' . $params : ''));
        } elseif ($method == 'POST') {
            $params = [ 'form_params' => $params ];
            $res = $client->request($method, $base_uri . '/' . $path, $params);
        } elseif ($method == 'PUT') {
            $res = $client->request($method, $base_uri . '/' . $path, $params);
        } else {
            return false;
        }

        $res = $res->getBody();
        $res = json_decode($res, true);

        return $res;
    }
}

if (!function_exists('alert')) {
    function alert($value, $die = false)
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        if ($die) {
            die;
        }
    }
}

if (!function_exists('sdebug')) {
    function sdebug($value, $die = false)
    {
        if (isset($_GET['sdebug'])) {
            echo "<pre>";
            print_r($value);
            echo "</pre>";
            if ($die) {
                die;
            }

        }
    }
}

/**
 * Dump the given value and kill the script.
 *
 * @param  mixed  $value
 * @return void
 */
if (!function_exists('dump')) {
    function dump($value, $die = false)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        if ($die) {
            die;
        }

    }
}

/**
 * Print the given value and kill the script.
 *
 * @param  mixed  $value
 * @return void
 */
if (!function_exists('jsn')) {
    function jsn($value, $die = true)
    {
        // echo "<pre>";
        echo json_encode($value);
        //echo "</pre>";
        if ($die) {
            die;
        }

    }
}
