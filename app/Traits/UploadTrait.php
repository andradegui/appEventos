<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait UploadTrait{

    public function multipleFilesUploads(array $files, string $folder, string $column){

        $uploadedFiles = [];

        foreach( $files as $file ){

            $uploadedFiles[] = [$column => $this->upload($file, $folder)];

        }

        return $uploadedFiles;

    }

    public function upload(UploadedFile $file, $folder){

       return $file->store($folder, 'public');

    }

}

