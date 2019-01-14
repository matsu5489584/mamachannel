<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Topics;
use App\Topicfile;
use Carbon\Carbon;

class TopicsController extends Controller
{
    // 以下を追記
  public function add()
  {
      return view('admin.topics.create');
  }
  // 以下を追記
    public function update(Request $request)
    {
            // 以下を追記
            // Varidationを行う
            $this->validate($request, Topics::$rules);
            $topics = new Topics;
            $form = $request->all();

            // フォームから画像が送信されてきたら、保存して、$topics->image_path に画像のパスを保存する
            if (isset($form['image'])) {
              $path = $request->file('image')->store('public/image');
              $topics->image_path = basename($path);
            } else {
                $topics->image_path = null;
            }

            // フォームから送信されてきた_tokenを削除する
            unset($form['_token']);
            // フォームから送信されてきたimageを削除する
            unset($form['image']);

            $topicfile = new Topicfiles;
            $topicfile->$topics_id =$topics->id;
            $topicfile->edited_at = Carbon::now();
            $topicfile->save();

            return redirect('admin/topics/create');
    }
  }
