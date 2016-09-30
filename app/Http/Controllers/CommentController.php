<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Comment;
use App\Models\Review;
use Auth;

class CommentController extends Controller
{
    public function postAddComment(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'reviewId' => 'required',
        ]);
        if (!Review::find($request->reviewId)) {
            return response()->json(['err' => trans('user.review.not_exist'), 404]);
        }

        $params['user_id'] = Auth::user()->id;
        $params['review_id'] = $request->reviewId;
        $params['content'] = $request->content;
        $comment = Comment::create($params);
        if (!$comment) {
            return response()->json(['err' => trans('user.query_fail'), 500]);
        }

        $currentReview = Review::withCount('comments')->findOrFail($request->reviewId);
        $htmlComents = '<span id="rv-num-comments">'
            . trans('user.comments', ['num_comment' => $currentReview->comments_count])
            . '</span>';

        return response()->json([
            'htmlComents' => $htmlComents,
            'htmlValue' => view('includes.itemComment', ['comment' => $comment])->render(),
            200
        ]);
    }
}
