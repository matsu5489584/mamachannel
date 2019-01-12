<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicFiles extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
      'topics_id' => 'required',
      'edited_at' => 'required',
  );
}
