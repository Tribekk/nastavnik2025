<?php /** @noinspection PhpUnused */

namespace Domain\User\Models;

use Illuminate\Database\Eloquent\Model;
use Support\CastAttributes\SerializationString;

/**
 * @property integer id
 */
class Consultant extends Model
{
    protected $guarded = [];

    protected $casts = [
        'regalia_and_experience' => SerializationString::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getExperienceFormattedAttribute(): string
    {
        $word = num2word(intval($this->experience), ['год', 'года', 'лет']);
        return $this->experience . " " . $word;
    }
}
