<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    public function uploadImage(Request $request, $inputName, $path)  {

        if ($request->hasFile($inputName)) {

            $image = $request->{$inputName};

            $ext = $image->extension();

            $imageName = 'media_' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            return $path. '/'. $imageName;
        }

    }

    public function removeImage(string $path) : void {
        if (File::exists(public_path($path))) {
              File::delete(public_path($path));
        }
    }
}
