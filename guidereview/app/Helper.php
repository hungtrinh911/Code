<?php
/**
 * Created by PhpStorm.
 * User: tuannm2
 * Date: 6/27/2018
 * Time: 11:14 AM
 */

namespace App;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Helper
{
    /**
     * Lấy ra đường dẫn hiện thời
     * @param bool $noSlash Chứa dấu gạch chéo ở đầu hay không
     * @return mixed
     */
    public static function currentRoutePrefix($noSlash = false)
    {
        if (Route::current() != null)
            $temp = Str::lower(explode('/', Route::current()->uri)[0]);
        else
            $temp = '';
        switch ($temp) {
            case env('BACKEND_ALIAS'):
                $temp = env('BACKEND_ALIAS');
                break;
            default:
                $temp = '';
                break;
        }
        if ($noSlash) {
            return $temp;
        } else {
            return '/' . $temp;
        }
    }

    /**
     * Lấy ra ngôn ngữ hiện thời đang dùng
     */
    public static function currentLocale()
    {
        // Nếu có trong session thì trả ra
        if (session()->has('locale')) {
            return session('locale');
        }

        // Chưa có thì lưu vào session
        session(['locale' => Option::get('locale_default')]);
        return session('locale');
    }

    /**
     * Danh sách ngôn ngữ đang hỗ trợ
     */
    public static function localeList()
    {
        return Option::get('locale_list');
    }

    /**
     * Trả ra 0 nếu là locale mặc định và 1 là locale khác (ảnh hưởng đến thứ tự của url segments)
     * @return int
     */
    public static function slugIndex()
    {
        return app()->getLocale() == env('LOCALE_DEFAULT') ? 0 : 1;
    }
}