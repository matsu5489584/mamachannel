<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Topics;
use App\Topicfiles;
use Carbon\Carbon;

class TopicsController extends Controller
{
    // 以下を追記
  public function add()
  {
      return view('admin.topics.create');
  }
  // 以下を追記
    public function create(Request $request)
    {
            // 以下を追記
            // Varidationを行う
            $this->validate($request, Topics::$rules);
            $topics = new Topics;
            $form = $request->all();
            $topics->title = $form['title'];
            $topics->content = $form['content'];
            $topics->save();

            $topicfile = new Topicfiles;
            $topicfile->topic_id =$topics->id;

            // フォームから画像が送信されてきたら、保存して、$topics->image_path に画像のパスを保存する
            if (isset($form['image'])) {
              $path = $request->file('image')->store('public/image');
              $topicfile->file = basename($path);
              } else {
                  $topicfile->file = null;
              }
            $topicfile->created_at = Carbon::now();
            $topicfile->save();

            return redirect('admin/topics/create');
    }
  }
