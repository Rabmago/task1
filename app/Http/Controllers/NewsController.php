<?php

namespace App\Http\Controllers;

use App\Models\News;
use http\Env\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Builder;

class NewsController extends Controller
{
    /**
     * @mixin Eloquent\
     * @mixin Builder
     */

    public function index()
    {
        $data = News::all();
        return response()->json([
           'data' => $data
        ]);
    }



    public function create(\Illuminate\Http\Request $request)
    {
        $news = new News();
        $news->image = $request->image;
        $news->header = $request->header;
        $news->description = $request->description;

        $news->save();
        return response()->json([
            'message' => 'News created successfully'
        ]);
    }

    public function findById( int $id)
    {
        $data = News::findOrFail($id);
        return response()->json([
            'data' => $data
        ]);
    }



    public function update(\Illuminate\Http\Request $request, int $id)
    {
        $news = News::findOrFail($id);
        $news->image = $request->image;
        $news->header = $request->header;
        $news->description = $request->description;

        $news->save();
        return response()->json([
            'message' => 'News updated successfully'
        ]);
    }

    public function delete( int $id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return response()->json([
            'message' => 'News deleted successfully'
        ]);
    }


}
