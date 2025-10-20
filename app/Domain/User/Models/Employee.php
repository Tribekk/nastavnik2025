<?php /** @noinspection PhpUnused */

namespace Domain\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


/**
 * @property integer id
 * @property MorphTo employeeable
 */
class Employee extends Model
{
    protected $guarded = [];

    public function employeeable(): MorphTo
    {
        return $this->morphTo('employeeable');
    }
}
