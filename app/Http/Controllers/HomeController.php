<?php

namespace App\Http\Controllers;

use App\Models\Admin\Item\Category;
use App\Models\Admin\Item\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
//        dump($request->has('search_by_item'));
//        dump($request->has('search_by_category'));

//        dump($request->get('search_by_item'));
//        dump($request->get('search_by_category'));

//        dump($request->all());

        $query = Item::orderByDesc('id');

        if ($request->has('search_by_item')) {
            if (!empty($value = $request->get('title'))) {
                $query->where('title', 'LIKE', "%{$value}%");
            }

            if (!empty($value = $request->get('article_number'))) {
                $query->where('article_number', 'LIKE', "%{$value}%");
            }

            if (!empty($value = $request->get('category_id'))) {
                $query->where('category_id', $value);
            }
        }

        if ($request->has('search_by_category')) {
            if (!empty($value = $request->get('search_by_category'))) {
                $query->where('category_id', $value);
            }
        }

        $items = $query->paginate(100);
        $categories = Category::all();
        return view('home', compact('items', 'categories'));
    }
}
