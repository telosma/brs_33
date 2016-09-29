<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Response;

class ReviewController extends Controller
{

    public function index()
    {
        return view('admin.review.list');
    }

    public function ajaxList()
    {
        $reviews = Review::withCount(['comments', 'usersLikes'])->with([
            'book' => function ($query){
                $query->select('id', 'title', 'book_image');
            },
            'user' => function ($query){
                $query->select('id', 'name', 'gender');
            },
        ])->get();

        return [
            'data' => $reviews,
        ];
    }

    public function ajaxDelete(Request $request)
    {
        $resultCount = 0;
        $requestCount = 0;
        $response = [];
        $rid = $request->id;
        if (is_array($rid)) {
            $requestCount = count($rid);
            foreach ($rid as $id) {
                if ($this->deleteById($id)) {
                    $resultCount++;
                }
            }
        } else {
            $result = $this->deleteById($rid);
            $requestCount++;
            if ($result) {
                $resultCount++;
            }
        }

        if ($resultCount == $requestCount) {
            $response[config('common.flash_level_key')] = config('common.flash_level.success');
        } elseif ($requestCount > 0 && $resultCount == 0) {
            $response[config('common.flash_level_key')] = config('common.flash_level.danger');
        } else {
            $response[config('common.flash_level_key')] = config('common.flash_level.warning');
        }

        $response[config('common.flash_message')] = trans('admin.response.delete', [
            'num' => $resultCount,
            'sum' => $requestCount,
            'result' => trans('admin.result.success'),
        ]);

        return $response;
    }

    public function deleteById($id)
    {
        try {
            Review::find($id)->delete();

            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }
}
