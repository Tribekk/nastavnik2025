<?php

namespace Domain\Orgunit\Models;

use Domain\Event\Models\Event;
use Domain\Image\Models\Image;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Support\CastAttributes\SerializationString;
use Support\HasTreeRelation;
use Support\Model;

class ExternalOrgunit extends Model
{
    use HasTreeRelation;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'title' => SerializationString::class,
        'short_title' => SerializationString::class,
        'legal_address' => 'object',
        'fact_address' => 'object',
        'description' => SerializationString::class,
        'career_program' => SerializationString::class,
        'about_orgunit' => SerializationString::class,
        'contacts' => SerializationString::class,
        'code_access' => SerializationString::class,
    ];

    public function logo()
    {
        return $this->morphOne(Image::class, "imageable");
    }

    public function legalForm()
    {
        return $this->belongsTo(LegalForm::class, "legal_form_id");
    }

    public function parent()
    {
        return $this->belongsTo(ExternalOrgunit::class, "parent_id");
    }

    public function activityKinds()
    {
        return $this->hasMany(OrgunitHasActivityKind::class, "orgunit_id");
    }

    public function getLogoUrlAttribute(): string
    {
        return $this->logo
            ? Storage::disk($this->logo->disk)->url($this->logo->filename)
            : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->title)));
    }

    public function children() {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function getHasRelationsAttribute(): bool
    {
        return boolval(User::where('orgunit_id', $this->id)->first() || ExternalOrgunit::where('parent_id', $this->id)->first());
    }

    public function users() {
        return User::where('orgunit_id', $this->id)->orderBy('last_name')->get();
    }

    public function events()
    {
        return $this->hasMany(Event::class, "orgunit_id");
    }

    public function getActivityKindIdsArrAttribute(): array
    {
     ///   dd($this->activityKinds()->get()->pluck('activity_kind_id')->toArray());
        return $this->activityKinds()->get()->pluck('activity_kind_id')->toArray();
    }
}
