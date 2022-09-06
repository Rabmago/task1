<?php

namespace App\Http\Controllers;

use App\Models\News;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index()
    {
        try {
            $data = News::all();
            return response()->json([
                'data' => $data
            ]);
        } catch (\Exception $exception) {
            Log::error(__METHOD__ . ' error ' . $exception->getMessage());
        }

    }

    public function create(Request $request)
    {
        try {
            $news = new News();
            $news->image = $request->image;
            $news->header = $request->header;
            $news->description = $request->description;
            $news->save();
            $this->validate($request, [
                'image' => 'nullable|string',
                'header' => 'required|string|max:2000',
                'description' => 'required|string'
            ]);
            return response()->json([
                'message' => 'News created successfully'
            ]);
        } catch (\Exception $exception) {
            Log::error(__METHOD__ . ' error ' . $exception->getMessage());
            return response()->json([
                'message' => 'Something wrong when news was creating'
            ]);
        }

    }

    public function findById( int $id)
    {
        try {
            $data = News::findOrFail($id);
            return response()->json([
                'data' => $data
            ]);
        } catch (\Exception $exception) {
            Log::error(__METHOD__ . ' error ' . $exception->getMessage());
            return response()->json([
                'message' => 'News cannot be displayed'
            ]);
        }

    }



    public function update(Request $request, int $id)
    {
        try {
            $news = News::findOrFail($id);
            $news->image = $request->image;
            $news->header = $request->header;
            $news->description = $request->description;
            $news->save();
            $this->validate($request, [
                'image' => 'nullable|string',
                'header' => 'required|string|max:2000',
                'description' => 'required|string'
            ]);
            return response()->json([
                'message' => 'News updated successfully'
            ]);
        } catch (\Exception $exception) {
            Log::error(__METHOD__ . ' error ' . $exception->getMessage());
            return response()->json([
                'message' => 'News was not updated'
            ]);
        }

    }

    public function delete( int $id)
    {
        try {
            $news = News::findOrFail($id);
            $news->delete();
            return response()->json([
                'message' => 'News deleted successfully'
            ]);
        } catch (\Exception $exception) {
            Log::error(__METHOD__ . ' error ' . $exception->getMessage());
            return response()->json([
                'message' => 'News was not deleted'
            ]);
        }

    }


}
