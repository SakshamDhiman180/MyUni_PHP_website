<?php

namespace App\Services\Admin;

use App\Models\College;
use App\Models\Course;
use App\Models\Stream;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CollegeService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($data, $model)
    {
        $param = $data->validated();
        $college = new College();
        if ($data->hasFile('article_img')) {
            $param['banner_image'] = $this->saveFiles(
                $data->file('article_img'),
                'college-banner-image',
                $data->file('article_img')
            );
            $college->banner_image = $param['banner_image'];
        }
       
        $college->name = $param['name'];
        $college->description =  $param['description'];
        $college->address =  $param['address'];
        $college->city =  $param['city'];
        $college->state =  $param['state'];
        $college->zip =  $param['zip'];
        $college->contact_number =  $param['contact_number'];
        $college->email =$param['email'];
        $college->principal_name = $param['principal_name'];
        $college->code = $param['code'];
        
        $college->save();
    
        $streams = $param['streams'];
        $college->streams = json_encode($streams);
        $college->save();

        return $college;
    }

    public function saveFiles($file, $folder, $oldFile = "")
    {
        $uploadFile = $file;

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($data, $id)
    {
    
        $param = $data->validated();
     // dd($param );
       $college = college::where('id', $id)->first();
        if ($data->hasFile('banner_image')) {
        //     dd("i am here");
            $param['banner_image'] = $this->saveFiles(
                $data->file('banner_image'),
                'college-banner-image',
                $data->file('banner_image')
            );
            //dd( $param['banner_image']);
            $college->banner_image = $param['banner_image'];
        }
    
        
      
        $college->name = $param['name'];
        $college->description =  $param['description'];
        $college->address =  $param['address'];
        $college->city =  $param['city'];
        $college->state =  $param['state'];
        $college->zip =  $param['zip'];
        $college->contact_number =  $param['contact_number'];
        $college->email =$param['email'];
        $college->principal_name =$param['principal_name'];
        
        $college->save();
    
        $streams = $param['streams'];
        $college->streams = json_encode($streams);
        $college->save();

        return $college;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($model)
    {
        return $model->delete();
    }
}
