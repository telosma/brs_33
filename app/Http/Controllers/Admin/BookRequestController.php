<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookRequest;

class BookRequestController extends Controller
{
    public function index()
    {
        return view('admin.bookRequest.list');
    }

    public function ajaxList()
    {
        $bookRequests = BookRequest::with([
            'book' => function ($query) {
                $query->select(['id', 'title', 'author']);
            },
            'user' => function ($query) {
                $query->select(['id', 'name', 'gender']);
            },
        ])->get();

        return [
            'data' => $bookRequests,
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
            BookRequest::find($id)->delete();

            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function ajaxAccept(Request $request)
    {
        $resultCount = 0;
        $requestCount = 0;
        $response = [];
        $rid = $request->id;
        if (is_array($rid)) {
            $requestCount = count($rid);
            foreach ($rid as $id) {
                if ($this->acceptById($id)) {
                    $resultCount++;
                }
            }
        } else {
            $result = $this->acceptById($rid);
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

        $response[config('common.flash_message')] = trans('admin.response.accept', [
            'num' => $resultCount,
            'sum' => $requestCount,
            'result' => trans('admin.result.success'),
        ]);

        return $response;
    }

    public function acceptById($id)
    {
        try {
            $bookRequest = BookRequest::find($id);
            if ($bookRequest->accepted) {
                return false;
            }

            $bookRequest->accepted = true;
            $bookRequest->save();

            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }
}
