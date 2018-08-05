<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermController extends ApiController
{
    public function index()
    {
        $terms = parent::getListTerms('vi');
        $terms = $this->buildTree($terms);
        return view('backend.terms.index', ['terms' => $terms]);
    }

    public function save(Request $request)
    {
        $typePost = $request->input('typePost');
        if ($typePost == "0") {
            parent::addTerm($request);
        }
        if ($typePost == "1") {
            $result = parent::actionEditTerm($request);
        }
        $terms = parent::getListTerms('vi');
        $terms = $this->buildTree($terms);
        return view('backend.terms.index', ['terms' => $terms]);

    }

    public function buildTree($object, $parent = 0, $indent = 0)
    {
        foreach ($object as $item) {
            if ($item->parent_id == $parent) {
                if ($indent != 0) {
                    $item->name = str_repeat("--- ", $indent) . $item->name;
                }
                $this->buildTree($object, $item->id, $indent + 1);
            }
        }
        return $object;
    }

    public function viewEditTerm(Request $request)
    {
        $result = parent::viewEditTerm($request);
        return json_encode($result);
    }

    public function deleteTerm(Request $request)
    {
        $result = parent::deleteTerm($request);
    }

}
