<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Book;
use App\Models\Review;
use App\Models\Category;
use Auth;

class BookController extends Controller
{
    private $userId;
    private $categories;

    public function __construct()
    {
        if (Auth::check()) {
            $this->userId = Auth::user()->id;
        } else {
            $this->userId = null;
        }

        $this->categories = Category::withCount('books')->get()->toArray();
    }

    public function bookMenu($categoryCurrentId)
    {
        return $this->drawBookMenu($this->categories, $categoryCurrentId);
    }

    protected function drawBreadcrumbs($categoryCurrentId)
    {
        $category = Category::find($categoryCurrentId);
        if ($category) {
            return $this->drawBreadcrumbs($category->category_parent_id)
                . '<li><a href="'
                . route('book.showByCategory', $category->id)
                . '">'
                . $category->name
                . '</a></li>';
        }

        return null;
    }

    protected function drawBookMenu($categories, $categoryCurrentId, $category_parent_id = null)
    {
        $result = '';
        foreach ($categories as $key => $category) {
            if ($category['category_parent_id'] == $category_parent_id) {
                unset($categories[$key]);
                $children = $this->drawBookMenu($categories, $categoryCurrentId, $category['id']);
                $result .= view('includes.bookMenuPiece', [
                    'category' => $category,
                    'children' => $children,
                    'bookCountTree' => $this->bookCountTree($key),
                    'categoryCurrentId' => $categoryCurrentId,
                ])->render();
            }
        }

        return $result;
    }

    public function index()
    {
        $books = Book::with([
                'marks' => function($query) {
                    $query->where('user_id', $this->userId);
                },
                'favorites' => function($query) {
                    $query->where('user_id', $this->userId);
                },
            ])->orderBy('published_at', 'desc')->paginate(config('common.num_entry_per_page'));

        return view('book', [
            'bodyTitle' => trans('book.all_book'),
            'books' => $books,
            'bookMenu' => $this->bookMenu(null),
            'breadcrumbs' => $this->drawBreadcrumbs(null),
        ]);
    }

    protected function categoryAllTree($categoryId)
    {
        if (Category::find($categoryId)) {
            $response = [$categoryId];
            foreach ($this->categories as $category) {
                if ($category['category_parent_id'] == $categoryId) {
                    $response = array_merge($this->categoryAllTree($category['id']), $response);
                }
            }

            return $response;
        }

        return [];
    }

    public function bookCountTree($key)
    {
        if (isset($this->categories[$key])) {
            $response = $this->categories[$key]['books_count'];
            foreach ($this->categories as $k => $category) {
                if ($category['category_parent_id'] == $this->categories[$key]['id']) {
                    $response += $this->bookCountTree($k);
                }
            }

            return $response;
        }

        return 0;
    }

    public function showByCategory(Category $category)
    {
        $books = Book::with([
            'marks' => function($query) {
                $query->where('user_id', $this->userId);
            },
            'favorites' => function($query) {
                $query->where('user_id', $this->userId);
            },
        ])->whereIn('category_id', $this->categoryAllTree($category->id))
            ->orderBy('published_at', 'desc')
            ->paginate(config('common.num_entry_per_page'));

        return view('book', [
            'bodyTitle' => $category->name,
            'books' => $books,
            'bookMenu' => $this->bookMenu($category->id),
            'breadcrumbs' => $this->drawBreadcrumbs($category->id),
        ]);
    }

    public function show($bookId)
    {
        $book = Book::with([
            'marks' => function($query) {
                $query->where('user_id', $this->userId);
            },
            'favorites' => function($query) {
                $query->where('user_id', $this->userId);
            },
        ])->findOrFail($bookId);
        $reviews = Review::where('book_id', $bookId)->orderBy('created_at', 'desc')->paginate(5);

        return view('book.bookdetail', ['book' => $book, 'reviews' => $reviews]);
    }
}
