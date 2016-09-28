<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Review;
use App\Models\Book;
use App\Providers\UserService;
use Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:' . config('common.review_min_text_length'),
            'book_id' => 'required',
            'user_id' => 'required',
        ]);
        $params = $request->only(['book_id', 'user_id', 'content']);
        $review = Review::create($params);
        if ($review) {
            return redirect()->route('reviews.show', $review->id)->with([
                config('common.flash_message') => trans('user.review.create_success'),
                config('common.flash_level_key') => config('common.flash_level.success')
            ]);
        } else {
            return redirect()->back()->with([
                config('common.flash_message') => trans('user.review.create_unsuccess'),
                config('common.flash_level_key') => config('common.flash_level.danger')
            ]);
        }
    }

    public function show($id)
    {
        $review = Review::withCount(['comments', 'usersLikes', 'likeEvents'])->findOrFail($id);
        $review['liked'] = UserService::checkLiked($id, Auth::user()->id);
        $comments = $review->comments()->orderBy('created_at', 'ASC')->get();

        return view('user.review.show', ['review' => $review, 'comments' => $comments]);
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        if ($request->user()->id === $review->user->id) {
            $params = $request->only('content');
            if ($request->user()->reviews()->update($params)) {
                $newReview = Review::findOrFail($id);

                return response()->json([
                    'success' => trans('user.review.update_success'),
                    'content' => $newReview->content,
                    200
                ]);
            }
        } else {
            return response()->json([
                ['err' => trans('user.review.permission_deny'), 404]
            ]);
        }
    }

    public function getCreateReview($bookId)
    {
        $book = Book::findOrFail($bookId);

        return view('user.review.create', ['book' => $book]);
    }

    public function destroy($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        if (Auth::user()->id === $review->user->id) {
            if ($review->delete()) {
                return redirect()->route('users.show', Auth::user()->id)->with([
                    config('common.flash_message') => trans('user.review.success_delete'),
                    config('common.flash_level_key') => config('common.flash_level.success'),
                ]);
            }
        } else {
            return redirect()->back()->with([
                config('common.flash_message') => trans('user.review.permission_deny'),
                config('common.flash_level_key') => config('common.flash_level.danger'),
            ]);
        }

        return redirect()->back()->with([
            config('common.flash_message') => trans('user.review.unsuccess_delete'),
            config('common.flash_level_key') => config('common.flash_level.danger'),
        ]);
    }
}
