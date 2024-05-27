<?php

namespace App\Http\Controllers\Admin\Properties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Properties\PropertyService;
use App\Models\Properties;
use App\Http\Requests\Properties\PropertyFormRequest;
use Auth;

class PropertyController extends Controller
{
    protected $propertyService;
    public function __construct(PropertyService $propertyService){
        $this->propertyService = $propertyService;
    }

    public function add(){
        return view('admin.properties.add', [
            'title' => 'Thêm căn hộ, chung cư'
        ]);
    }
    public function create(PropertyFormRequest $request){
        $result = $this->propertyService->create($request);
        if($request){
            return redirect('properties/add');
        }
        return redirect()->back();
    }
    public function show(){
        $properties = $this->propertyService->getAll();
        return view('admin.properties.show', [
            'title' => 'Danh sách chung cư, căn hộ',
            'properties' => $properties
        ]);
    }
    public function edit(Properties $property){
        return view('admin.properties.edit',[
            'title' => 'Cập nhật chung cư, căn hộ',
            'property' => $property
        ]);
    }
    public function update($property, PropertyFormRequest $request){
        $result = $this->propertyService->update($property, $request);
        if($result){
            return redirect('admin/properties/show');
        }
        return redirect()->back();
    }
    public function delete(Request $request){
        $id = $request->input('id');
        $result = $this->propertyService->delete($id);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Property has been successfully deleted!'
            ]);
        }
        return response()->json([
            'error' => true
        ], 500);
    }

    public function posted(){
        $user_id = Auth::user()->id;
        $properties = $this->propertyService->getByUser($user_id);
        return view('admin.properties.posted', [
            'title' => 'Properties posted',
            'properties' => $properties
        ]);
    }
}
