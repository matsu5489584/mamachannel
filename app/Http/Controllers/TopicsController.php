<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topics;
use App\Topicfiles;

class TopicsController extends Controller
{
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      // $cond_title が空白でない場合は、記事を検索して取得する
      if ($cond_title != '') {
          $topics = Topics::where('title', $cond_title).orderBy('updated_at', 'desc')->get();
      } else {
          $topics = Topics::all()->sortByDesc('updated_at');
      }

      if (count($topics) > 0) {
          $headline = $topics->shift();
      } else {
          $headline = null;
      }

      // news/index.blade.php ファイルを渡している
      // また View テンプレートに headline、 posts、 cond_title という変数を渡している
      return view('topics.index', ['headline' => $headline, 'topics' => $topics, 'cond_title' => $cond_title]);
  }
}
