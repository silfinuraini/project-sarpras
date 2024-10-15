<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class ImageHelper {
    public static function handleImage(UploadedFile $image)
    {
        $fileName = time() . '.' . $image->extension();
        $gambarPath = $image->storeAs('public', $fileName);

        return $fileName;
    }
}