<?php

namespace App\Http\Services;

class ImagePath
{
    public string $original;
    public string|array $thumbnail;
    public string|array $medium;
    public string|array $large;
    public string $url;

    public function __construct($relative_path)
    {
        $this->original = $relative_path;

        $base_name = basename($relative_path);
        $thumbnail_path = str_replace($base_name, "thumbnail_" . $base_name, $relative_path);
        $medium_path = str_replace($base_name, "medium_" . $base_name, $relative_path);
        $large_path = str_replace($base_name, "large_" . $base_name, $relative_path);

        $this->medium = $medium_path;
        $this->thumbnail = $thumbnail_path;
        $this->large = $large_path;
    }
}
