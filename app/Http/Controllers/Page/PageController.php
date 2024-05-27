<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Properties;
use App\Models\Comment;

class PageController extends Controller
{
    public function index(){
        $properties = Properties::with('image_main')->get();
        return view('pages.home', [
            'title' => 'Trang chủ',
            'properties' => $properties
        ]);
    }
    public function listProperty(){
        $properties = Properties::with('image_main')->get();
        return view('pages.list_properties', [
            'title' => 'Danh sách căn hộ, chung cư', 
            'properties' => $properties
        ]);
    }
    public function propertyDetail(Properties $property){
        return view('pages.property_detail',[
            'title' => 'Trang chi tiết',
            'property' => $property
        ]);
    }
    public function propertiesAPI(){
        $properties = Properties::selectRaw('id,title,address,ST_AsGeoJSON(geom) as geometry')->get();
        $features = array();
        foreach ($properties as $key => $property) {
            $feature = [
                'type' => 'Feature',
                'properties' => [
                    'id' => $property->id,
                    'title' => $property->title,
                    'address' => $property->address,
                    'url' => url('chi-tiet/' . $property->id . '-' .str()->slug($property->title, '-') . '.html'),
                ],
                'geometry' => \json_decode($property->geometry)
            ];
            $features[] = $feature;
        }
        $data = [
            'type' => 'FeatureCollection',
            'features' => $features
        ];
        return response()->json($data);
    }
    public function propertyAPI($property){
        $property = Properties::selectRaw('id,ST_AsGeoJSON(geom) as geometry')->where('id', $property)->first();
        $feature = [
            'type' => 'Feature',
            'properties' => [
                'id' => $property->id,
            ],
            'geometry' => json_decode($property->geometry)
        ];
    
        return response()->json([
            'type' => 'FeatureCollection',
            'features' => [$feature]
        ]);
        
    }
    public function addComment(Request $request){
        $content = $request->input('content');
        $property = $request->input('property_id');
        try{
            $comment = Comment::create([
                'content' => $content,
                'user_id' => Auth::user()->id,
                'property_id' => $property
            ]);
            $comment->load('user');
            return response()->json([
                'error' => false,
                'comment' => $comment,
                'message' => 'Bình luận thành công!'
            ]);
        }catch(Exception $e){
            Log::error('Error occurred while processing API request: ' . $e->getMessage());
            return response()->json([
                'error' => true,
                'message' => 'Đã xảy ra lỗi!'
            ]);
        }
    }
    public function showComments($property){
        $comments = Comment::where('property_id', $property)->orderBy('id', 'desc')->with('user')->paginate(5);
        
        return response()->json($comments);
        
    }
}
