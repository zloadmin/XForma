<?php
declare(strict_types=1);


namespace App\Models\Media;


use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Http\UploadedFile;

trait Mediable
{
    public function media(): MorphToMany
    {
        return $this->morphToMany(Media::class, 'mediable');
    }

    public function storeMedia(UploadedFile $document): void
    {
        $this->media()->create([
            'path'               => $document->store('media'),
            'original_name'      => $document->getClientOriginalName(),
            'size'               => $document->getSize(),
        ]);
    }



    abstract public function morphToMany($related, $name, $table = null, $foreignPivotKey = null,
                                         $relatedPivotKey = null, $parentKey = null,
                                         $relatedKey = null, $relation = null, $inverse = false);
}
