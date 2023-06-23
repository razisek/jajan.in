<?php

namespace App\Library\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomPath implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $modelId = $media->model_id;
        $collection = $media->collection_name;
        $mediaId = $media->getKey();

        if ($media->model_type === 'user') {
            return "users/{$modelId}/$collection/{$mediaId}/";
        }
        if ($media->model_type === 'post') {
            return "posts/{$modelId}/$collection/{$mediaId}/";
        }
        if ($media->model_type === 'unit') {
            return "units/{$modelId}/$collection/{$mediaId}/";
        }
        return $mediaId;
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive/';
    }
}
