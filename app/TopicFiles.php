<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topicfiles extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
      'topics_id' => 'required',
      'edited_at' => 'required',
  );
  public function topicfiles()
  {
    return $this->hasMany('App\Topicfiles');

}

}
