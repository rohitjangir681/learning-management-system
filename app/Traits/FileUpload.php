<?php 

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait FileUpload {
    public function uploadFile(?UploadedFile $file, string $directory = 'uploads')
    {
        if(!$file){
            return null;
        }
        $file_name = 'educore_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($directory), $file_name);

        return '/' . $directory . '/' . $file_name;
    }

    public function deleteFile($file)
    {
        if(File::exists(public_path($file))){
            File::delete(public_path($file));
            return true;
        }
        return false;
    }
}


