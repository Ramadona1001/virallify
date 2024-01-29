<?php

namespace App\Http\Trait;
use Illuminate\Support\Facades\Storage;

trait UploadImage
{
    public function upload($file,$path,$name = null)
    {
        $rand_number = rand(1,999);
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        Storage::makeDirectory('public/uploads/'.$path);
        $fileNameToStore = $rand_number.'_'.date('Y_m_d').'_'.time().'.'.$extension;
        $file->storeAs('public/uploads/'.$path,$fileNameToStore);
        return 'storage/uploads/'.$path.'/'.$fileNameToStore;
    }
}