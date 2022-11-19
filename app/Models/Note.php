<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $note_body
 * @property string $is_important
 */
class Note extends Model
{
    use SoftDeletes;

    protected $table = 'Notes';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'note_body',
        'is_important'
    ];

    /**
     * @return BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
