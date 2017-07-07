<?php

namespace LodhaStarter;

use Illuminate\Database\Eloquent\Model;

class WitaiResponse extends Model
{
    protected $fillable = ['msg_id', 'facebook_request_id', 'action', 'parameters'];
    protected $table = 'witai_responses';

    public static $custom_action_namespace = 'indiansuperleague';

    public function hasAction() {
        return !empty($this->action);
    }

}
