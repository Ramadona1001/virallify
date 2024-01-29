<?php

namespace App\Http\Trait;

trait UploadImage
{
    public function upload($file,$path,$name = null)
    {
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = ($name == null) ? $filename.rand(1,9999).'_'.time().'.'.$extension : $name.'.'.$extension;
        $file->storeAs('public/uploads/'.$path,$fileNameToStore);
        return 'storage/uploads/'.$path.'/'.$fileNameToStore;
    }
}