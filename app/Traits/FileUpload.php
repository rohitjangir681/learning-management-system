<?php 

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileUpload {
    public function uploadFile(UploadedFile $file, string $directory = 'uploads')
    {
        $file_name = 'educore_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($directory), $file_name);

        return '/' . $directory . '/' . $file_name;
    }
}


