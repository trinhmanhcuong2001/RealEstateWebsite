<?php

namespace App\Http\Services\ImageDescription;

class ImageDescriptionService {
    public function uploads($imageDescription){
        if($imageDescription){
            try{
                $name = $imageDescription->getClientOriginalName();
                $path = '/uploads/properties/description/' . date('Y-m-d/H/i/s');
                $imageDescription->storeAs(
                    'public/' . $path . '/' .$name
                );
                return 'storage' . $path . '/' . $name;
            } catch(\Exception $e){
                session()->flash('error', $e->getMessage());
                return false;
            }
        }
    }
}