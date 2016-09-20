<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Book;
use File;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function create()
    {
        $categories = Category::lists('name', 'id');

        return view('admin.book.create', ['categories' => $categories]);
    }

    public function store(BookRequest $request)
    {
        $bookRequest = $request->only([
            'title',
            'author',
            'num_page',
            'description',
            'category_id',
            'published_at',
            'book_image',
        ]);
        if (Book::create($bookRequest)) {
            return redirect()->back()->with([
                config('common.flash_message') => trans('message.create_success', ['name' => trans('admin.book')]),
                config('common.flash_level_key') => config('common.flash_level.success'),
            ]);
        }

        return redirect()->back()->withErrors([
            trans('message.create_failed', ['name' => trans('admin.book')]),
        ]);
    }
}
