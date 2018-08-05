<?php

namespace App\Http\Controllers\Backend;

use App\Menu;
use App\NewsCategory;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Base\Thing;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view("backend.menu.index");
    }

    /**
     * Sua Role
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request)
    {
        $menu = Menu::find($request->id);
        if (!$menu) {
            return redirect()->action('Backend\MenuController@index');
        }

        $thing_menu = $menu->getThings($menu->id, session('locale'))[0];
        if (!$menu) {
            return redirect()->action('Backend\MenuController@index');
        }
        $thing = Thing::find($thing_menu->id);

        try {
            DB::transaction(function () use ($request, $menu, $thing) {

                // 01. update bang terms
                $menu->name = $request->input('name');
                $menu->slug = $request->input('slug');
                $menu->parent_id = $request->input('parent_id');
                $menu->status = $request->input('status');
                $menu->locale = session('locale');
                $menu->type = 'frontend_menu';
                $menu->update();

                // 02. update du lieu bang Thing
                $thing->title = $request->input('name');
                $thing->slug = '/' . $request->input('slug');
                $thing->parent_id = 0;//$request->input('parent_id');
                $thing->featured_img = $request->input('featured_img');
                $thing->status = $request->input('status');
                $thing->metadata = '{"hasChild":false,"showOnMenu":false,"url":' . $request->input('slug') . '}';
                $thing->locale = session('locale');
                $thing->order_index = (int)$request->input('order_index');
                $thing->author_id = Auth::user()->id;
                $thing->type = 'menu_item';
                $thing->update();

                // 03. update du lieu bang terms_things
                $thing->terms()->sync($menu->id);
            });

            //dd($thing);
            return back()->with([
                'success' => trans('backend/common.success'),
                //'things' => $thing,
                //'menu' => $menu
            ])->withInput();

        } catch (Exception $e) {
            $e->getMessage();
            DB::rollBack();
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Hiển thị form edit
     */
    public function showEditForm($id = 0)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->action('Backend\MenuController@index');
        }

        return view('backend.menu.edit')->with([
            'menu' => $menu
        ]);
    }

    public function showAddForm()
    {
        return view('backend.menu.add');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:terms|max:255',
            'slug' => 'required|unique:terms|max:255'
        ]);

        try {
            DB::transaction(function () use ($request) {

                // 01. them menu vao bang terms
                $menu = new Menu();
                $menu->name = $request->input('name');
                $menu->slug = $request->input('slug');
                $menu->parent_id = $request->input('parent_id');
                $menu->status = $request->input('status');
                $menu->locale = session('locale');
                $menu->type = 'frontend_menu';
                $menu->save();

                // 02. Them du lieu bang Thing
                $thing = new Thing();
                $thing->title = $request->input('name');
                $thing->slug = '/' . $request->input('slug');
                $thing->parent_id = 0;//$request->input('parent_id');
                $thing->featured_img = $request->input('featured_img');
                $thing->status = $request->input('status');
                $thing->metadata = '{"hasChild":false,"showOnMenu":false,"url":' . $request->input('slug') . '}';
                $thing->locale = session('locale');
                $thing->order_index = (int)$request->input('order_index');
                $thing->author_id = Auth::user()->id;
                $thing->type = 'menu_item';
                $thing->save();

                // 03. Them du lieu bang terms_things
                $thing->terms()->attach($menu->id);
            });

            return back()->with([
                'success' => trans('backend/common.success')
            ])->withInput();
        } catch (\Exception $ex) {
            //dd($ex->getMessage());
            return back()->with('error', trans('backend/common.error'))->withInput();
        }


    }
}
