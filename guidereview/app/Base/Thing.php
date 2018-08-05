<?php

namespace App\Base;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\News;
use App\NewsCategory;

class Thing extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function terms()
    {
        return $this->belongsToMany(Term::class, 'terms_things');
    }

//    public static function list($type)
//    {
//        $list = Thing::where('type', '=', $type)->get();
//        return $list;
//    }

    /**
     * Danh sách được phân trang
     * @param $type
     * @param $locale
     * @param $search
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public static function pagedList($locale, $type, $search, $offset, $limit)
    {
        $list = Thing::where('type', $type)
            ->where('locale', $locale)
            ->where('title', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $list;
    }

    public static function count($locale, $type, $search)
    {
        $count = Thing::where('type', $type)
            ->where('locale', $locale)
            ->where('title', 'like', '%' . $search . '%')
            ->count();
        return $count;
    }

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($locale = '', $hasRoot = true, $type)
    {
        $retList = collect();
        if ($hasRoot) {
            
            $root = new Thing();
            $root->id = 0;
            $root->title = '----------';
            $retList->put($root->id, $root);
        }

       

        $list = Thing::where([
            ['type', $type],
            ['locale_source_id', 0],
            ['locale', '!=', $locale == '' ? session('locale') : $locale],
        ])->whereNotIn('id', function ($query) {
            $query->select('locale_source_id')->from('things');
        })->get();

        foreach ($list as $item) {
            $retList->put($item->id, $item);
        }

        return $retList;
    }

    public static function orphanListEdit($locale = '', $hasRoot = true, $type,$id=0)
    {
        $retList = collect();
        $news = News::with('categories:id')->find($id);
        $samenews = DB::table('things')->where('locale_source_id',$news->id)->first();
        $samenews2 = DB::table('things')->where('id',$news->locale_source_id)->first();
       // dd($samenews);
        if ($id != 0 && $samenews != null) {
            
            $root = new Thing();
            $root->id = $samenews->id;
            $root->title = $samenews->title;
            $retList->put($root->id, $root);
        }  
        if ($id != 0 && $samenews2 != null) {

            $root = new Thing();
            $root->id = $samenews2->id;
            $root->title = $samenews2->title;
            $retList->put($root->id, $root);
        }  
        if ($hasRoot) {
            
            $root = new Thing();
            $root->id = 0;
            $root->title = '----------';
            $retList->put($root->id, $root);
        } 

        $list = Thing::where([
            ['type', $type],
            ['locale_source_id', 0],
            ['id','!=',$id],
            ['locale', '!=', $locale == '' ? session('locale') : $locale]
        ])->whereNotIn('id', function ($query) {
            $query->select('locale_source_id')->from('things');
        })->get();

        foreach ($list as $item) {
            $retList->put($item->id, $item);
        }

        return $retList;
    }
}
