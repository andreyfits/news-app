<?php

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


/**
 * Function creates Thumbnail while uploading original image and returns an array with path information of original image as
 * well as thumbnail.
 *
 * @param $input_image
 * @param $upload_folder
 * @return array|string
 */

function uploadImage($input_image, $upload_folder): array|string
{
    $public_upload_path = public_path() . '/uploads/';

    $upload_destination = $public_upload_path . $upload_folder;

    if (!File::exists($upload_destination)) {
        File::makeDirectory($upload_destination, 0775, true);
    }

    $file_name = $input_image->getClientOriginalName();

    //Upload Original file
    $input_image->move($upload_destination, $file_name);
    $uploaded_file_path = $upload_destination . '/' . $file_name;

    return '/uploads/' . $upload_folder . '/' . $file_name;
}
