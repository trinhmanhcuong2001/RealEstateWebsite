<?php

namespace App\Http\Services\ImageMain;

class ImageMainService {
    public function uploads($imageMain){
        if($imageMain){
            try{
                $name = $imageMain->getClientOriginalName();
                $path = '/uploads/properties/main/' . date('Y-m-d/H/i/s');
                $imageMain->storeAs(
                    'public/' . $path . '/' .$name
                );
                return 'storage' . $path . '/' . $name;
            } catch(\Exception $e){
                return false;
            }
        }
    }
}