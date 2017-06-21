<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';}
?>