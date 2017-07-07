<?php

namespace LodhaStarter;

use Illuminate\Database\Eloquent\Model;

use LodhaStarter\FacebookUser;

class EnvironmentProperty extends Model
{
   protected $table = 'environment_properties';
   protected $fillable = ['maintainance_mode'];

   public static function inMaintainance() {    
        $dynamic_env_setting = EnvironmentProperty::first();
        return $dynamic_env_setting->maintainance_mode;
    }

    public static function toggleMaintainance() {
    	$dynamic_env_setting = EnvironmentProperty::first();
    	if(EnvironmentProperty::inMaintainance()) {
        $dynamic_env_setting->maintainance_mode = false;
    	}else {
    		$dynamic_env_setting->maintainance_mode = true;
    	}
      $dynamic_env_setting->save();

      /*
      * Reset Campaign Flags for all facebook users on toggle.
      */
      $users = FacebookUser::where('slogan_flag', true)->update(['slogan_flag' => false]);
    }
}
