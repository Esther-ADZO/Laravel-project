<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
     protected $fillable = [
        'title',
        'statut',
        'description',
        'user_id',
    ];

 public function users(): BelongsToMany
     {
    return $this->belongsToMany(User::class, 'task_user');
     }

     /**
 * Les utilisateurs assignés à cette tâche 
 */
public function assigner(): BelongsToMany
  {
    return $this->belongsToMany(User::class, 'task_user');    
  }
}

