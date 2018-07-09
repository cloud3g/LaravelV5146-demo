<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/6 0006
 * Time: 下午 03:14
 */

function admin_view($template)
{
    $params = func_get_args();//获取函数传入的参数列表 数组
    $params[0] = 'admin.'.$params[0];
    return call_user_func_array('view' ,$params );//调用回调函数，并把一个数组参数作为回调函数的参数
}

function staticPath($file)
{
    $staticPath = env('STATIC_URL');
    if (!empty($staticPath)) {
        return $staticPath . $file;
    }
    return url('skin'. $file);
}

function route2url($route = '')
{
    if(empty($route)) return '/';
    try{
        return route($route);
    }catch (\Exception $exception) {
        return '';
    }
}