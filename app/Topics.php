<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topics extends Model
{
  protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'title' => 'required',
        'content' => 'required',
    );
    public function topicfiles()
    {
      return $this->hasMany('App\Topicfiles','topic_id');

    }
}
