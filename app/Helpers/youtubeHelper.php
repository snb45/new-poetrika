<?php

namespace App\Helpers;

class youtubeHelper
{
    public static function extractVideoId($url)
    {
        // Regular expression to extract YouTube video ID
        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches);

        return $matches[1] ?? null;
    }
}
