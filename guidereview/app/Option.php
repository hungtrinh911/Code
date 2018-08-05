<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Option extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'options';
    protected $primaryKey = 'key';
    protected $keyType = 'string';

    /**
     * Lấy ra giá trị của 1 key. Trường hợp chưa lưu cache thì thực hiện lưu cache cho lần sau
     */
    public static function get($key)
    {
        $realKey = app()->getLocale() . '_' . $key;
        if (!Cache::has($realKey)) {
            $option = Option::where('key', $key)
                ->where(function ($query) {
                    $query->where('locale', '=', '')
                        ->orWhere('locale', '=', app()->getLocale());
                })->first();
            if (starts_with($option->value, '[') or starts_with($option->value, '{')) {
                Cache::put($realKey, json_decode($option->value), 60);
            } else {
                Cache::put($realKey, $option->value, 60);
            }
        }
        return Cache::get($realKey);
    }

    public static function forget($key)
    {
        $realKey = app()->getLocale() . '_' . $key;
        if (Cache::has($realKey)) {
            Cache::forget($realKey);
        }
    }
}
