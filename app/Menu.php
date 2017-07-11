<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

    function getItems(){
        return $this->hasMany('App\MenuItem', 'menu', 'id')->orderBy('order', 'ASC');
    }

}
?>