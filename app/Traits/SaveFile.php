<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait SaveFile
{
    private function removeImage($model, $attribute_name)
    {
        $file_path = public_path('storage/' . $model->{$attribute_name});
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    public function saveImage($request, $model, $folder_name, $attribute_name, $form_input_name)
    {
        //Remove image if new file uploaded
        if (($request->file($attribute_name)) && !empty($model->{$attribute_name})) {
            $this->removeImage($model, $attribute_name);
        }

        //Remove image if remove button clicked
        if ($request->has('remove_' . $attribute_name) && $request->{'remove_' . $attribute_name}) {
            if (!empty($model->{$attribute_name})) {
                $this->removeImage($model, $attribute_name);
            }
            $image = null;
        } else {
            $image = $model->{$attribute_name};
        }

        //Save image in public storage
        if ($request->{$form_input_name} instanceof UploadedFile) {
            $image = $request->file($form_input_name)->store($folder_name, 'public');
        }

        return $image;
    }

    public function saveFiles($file, $folder, $oldFile = "")
    {
        $uploadFile = $file;

        //Save image in public storage
        if ($file instanceof UploadedFile) {
            $uploadFile = $file->store($folder, 'public');
        }

        if ($oldFile != "") {

            $file_path = public_path('storage/' . $oldFile);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        return $uploadFile;
    }
    public function deleteFile($filePath)
    {
        $file = public_path('storage/' . $filePath);
        if (file_exists($file)) {
            unlink($file);
        }
    }
}
