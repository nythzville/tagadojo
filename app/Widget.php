<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'widgets';

    
}
?>