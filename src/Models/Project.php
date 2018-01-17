<?php 
namespace Bantenprov\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * The ProjectModel class.
 *
 * @package Bantenprov\Project
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class Project extends Model
{
    use SoftDeletes;

    protected $table = 'project';
    
    public $timestamps = true;

    protected $fillable = ['opd_id','staf_id','name','start_date','end_date','description'];

    protected $hidden = ['deleted_at'];

    protected $dates = ['deleted_at'];

    /* relation table */

    // public function task()
    // {
    //     return $this->belongsTo('App\Task');
    // }    

    public function getOpd()
    {
        return $this->hasOne('App\Opd', 'id','opd_id');
    }

    public function getStaf()
    {
        return $this->hasOne(config('project.models.staf'),'id','staf_id');
    }
}

