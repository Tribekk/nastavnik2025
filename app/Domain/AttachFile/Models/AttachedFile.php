<?php

namespace Domain\AttachFile\Models;

use Illuminate\Support\Facades\Storage;
use Support\Model;

class AttachedFile extends Model
{
    protected $guarded = ['id'];

    public function attacheable()
    {
        return $this->morphTo('attacheable');
    }

    public function getOnlyFilenameAttribute(): string
    {
        $segments = explode('/', $this->filename ?? "");
        return count($segments) ? $segments[count($segments)-1] : ($this->filename ?? "");
    }

    public function getUrlAttribute(): string
    {
        return Storage::disk($this->disk)->url($this->filename);
    }

    public function getPathAttribute(): string
    {
        return $this->disk.'/'.$this->filename;
    }
}
