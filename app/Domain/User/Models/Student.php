<?php /** @noinspection PhpUnused */

namespace Domain\User\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * @property integer id
 */
class Student extends Model
{
    protected $guarded = [];

    protected $casts = [
        'proposed_admission' => 'bool',
        'applied_admission' => 'bool',
        'enrolled_profile_uz' => 'bool',
        'concluded_target_agreement' => 'bool',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getStageTestsAndConsultations()
    {
        return $this->user()->getStageTestsAndConsultations;
    }
}
