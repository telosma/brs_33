<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    public function create()
    {
        $categories = Category::lists('name', 'id');

        return view('admin.category.create', ['categories' => $categories]);
    }

    public function store(CategoryRequest $request)
    {
        $categoryRequest = $request->only(['name', 'category_parent_id']);
        $category = Category::create($categoryRequest);
        if ($category) {
            return redirect()->back()->with([
                config('common.flash_message') => trans('message.create_success', ['name' => trans('admin.category')]),
                config('common.flash_level_key') => config('common.flash_level.success'),
            ]);
        }

        return redirect()->back()->withErrors([
            trans('message.create_failed', ['name' => trans('admin.category')]),
        ]);
    }
}
