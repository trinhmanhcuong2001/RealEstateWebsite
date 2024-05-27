<?php

namespace App\Http\Services\Properties;
use App\Models\Properties;
use App\Models\ImageMain;
use App\Models\ImageDescription;
use App\Http\Services\ImageMain\ImageMainService;
use App\Http\Services\ImageDescription\ImageDescriptionService;
use Auth;
use DB;
use Exception;

class PropertyService {

    protected $imageMainService;
    protected $imageDescriptionService;

    public function __construct(ImageMainService $imageMainService, ImageDescriptionService $imageDescriptionService) {
        $this->imageMainService = $imageMainService;
        $this->imageDescriptionService = $imageDescriptionService;
    }
    
    public function create($request){
        DB::beginTransaction();
        try {
            $imageMain = $this->imageMainService->uploads($request->file('image'));
            $imageDescriptions = $request->file('images');
            
            $property = Properties::create([
                'title' => $request->title,
                'description' => $request->description,
                'address' => $request->address,
                'price' => $request->price,
                'bedroom' => $request->bedroom,
                'bathroom' => $request->bathroom,
                'category' => $request->category,
                'geom' => DB::raw("ST_SetSRID(ST_MakePoint($request->lng, $request->lat), 4326)"),
                'user_id' => Auth::id()
            ]);
            ImageMain::create([
                'property_id' => $property->id,
                'image_url' => $imageMain
            ]);
            foreach($imageDescriptions as $imageDes){
                $nameImage = $this->imageDescriptionService->uploads($imageDes);
                if($nameImage){
                    ImageDescription::create([
                        'property_id' => $property->id,
                        'image_url' => $nameImage
                    ]);
                }
            }
            DB::commit();
            session()->flash('success','Thêm căn hộ, chung cư thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }
    public function getAll(){
        return Properties::with('image_main')->with('user')->paginate(10);
    }
    public function update($property, $request){
        DB::beginTransaction();
        try{
            $property = Properties::find($property);   
            if($property){
                $property->title = $request->title;
                $property->description = $request->description;
                $property->price = $request->price;
                $property->address = $request->address;
                $property->bedroom = $request->bedroom;
                $property->bathroom = $request->bathroom;
                $property->category = $request->category;
                $property->geom = DB::raw("ST_SetSRID(ST_MakePoint($request->lng, $request->lat), 4326)");          
                if($request->hasFile('imageInput')){
                    $property->image_main()->update(['image_url' => $request->image]);
                }
                $property->save();
                if($request->hasFile('images')){
                    $property->image_description()->delete();
                    $imageDescriptions = $request->file('images');
                    foreach($imageDescriptions as $imageDes){
                        $nameImage = $this->imageDescriptionService->uploads($imageDes);
                        if($nameImage){
                            ImageDescription::create([
                                'property_id' => $property->id,
                                'image_url' => $nameImage
                            ]);
                        }
                    }
                    
                }
                $property->save();
                DB::commit();
                session()->flash('success','Cập nhật căn hộ, chung cư thành công!');
            }
        }catch(Exception $e){
            DB::rollBack();
            session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }
    public function delete($id){
        try{
            $property = Properties::where('id', $id)->first();
            if($property){
                $property->delete();
                $property->image_main()->delete();
                $property->image_description()->delete();
                return true;
            }
        }catch(Exception $e){
            session()->flash('error', $e->getMessage());
            return false;
        }
    }

    public function getByUser($user){
        return Properties::where('user_id',$user)->get();
    }
}