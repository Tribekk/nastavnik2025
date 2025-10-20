<?php /** @noinspection PhpUnused */

namespace Domain\User\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @property integer id
 */
class ObservedPeople extends Model
{
    protected $table = "observed_people";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function observed()
    {
        return $this->belongsTo(User::class, "observed_user_id");
    }
}
