<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    function getValue($name){
    	$setting = Setting::where('name', $name)->first();
        return $setting->value;
    }
    
}
?>