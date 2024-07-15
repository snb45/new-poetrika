<?php

// app/Helpers/ImageHelper.php
namespace App\Helpers;

use Carbon\Carbon;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Intervention\Image\ImageManagerStatic as Image;

class ImageAlgo
{
    public static function imageAlgo($imagePath,$destinationPath)
    {
        $fileSizeLimit  = 1 * 1024 * 1024;

        $file           =   $imagePath;
        $destination    =   $destinationPath;
        $fileSize       = filesize($imagePath);

        // Create the destination path if it doesn't exist
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        // Generate a unique filename
        $filename = hash('sha256', Carbon::now() . date('d m y H:m:s')) . '.' . 'webp';

        // Create an Intervention Image instance
        $image = Image::make($file);

        if ($fileSize > $fileSizeLimit) {

            // Resize the image to 50% of its original dimensions
            $image->resize($image->width() / 2, $image->height() / 2);

            // Encode the image to WebP format with reduced quality (e.g., 80%)
            $webpPath = $destination . $filename;
            $image->encode('webp', 80)->save($webpPath);

        }else{

            // Encode the image to WebP format with reduced quality (e.g., 50%)
            $webpPath = $destination . $filename;
            $image->encode('webp', 50)->save($webpPath);
        }

        // Optimize the WebP image
        ImageOptimizer::optimize($webpPath);

        // Optionally, you can delete the original image if needed
        // unlink($file->getRealPath());

        return $filename;
    }

    public static function logoAlgo($imagePath,$destinationPath)
    {

        $file           =   $imagePath;
        $destination    =   $destinationPath;

        // Create the destination path if it doesn't exist
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        // Generate a unique filename
//        $filename = hash('sha256', Carbon::now() . date('d m y H:m:s')) . '.' . 'webp';
        $filename = 'logo-dark.png';

        // Create an Intervention Image instance
        $image = Image::make($file);

        // Encode the image to WebP format with reduced quality (e.g., 50%)
        $webpPath = $destination . $filename;
        $image->encode('webp', 0)->save($webpPath);

        // Optimize the WebP image
        ImageOptimizer::optimize($webpPath);

        // Optionally, you can delete the original image if needed
        // unlink($file->getRealPath());

        return $filename;
    }

    public static function MediaRandor($image){

        $originalSize = $image->getSize(); // Get original size of the image in bytes

        if ($originalSize > 2000000) { // Check if image size is greater than 1MB (1MB = 1000000 bytes)
            $resizedImage = Image::make($image)->resize(3000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 100); // Resize the image to a maximum width of 800px, maintaining aspect ratio, and encode it as JPEG with 75% quality

        } else {
            $resizedImage = Image::make($image)->encode('jpg', 100); // Encode the image as JPEG with 75% quality without resizing
        }

        return $resizedImage;


    }
}
