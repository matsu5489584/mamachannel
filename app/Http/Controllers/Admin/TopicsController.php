<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        // admin/topics/createにリダイレクトする
        return redirect('admin/topics/create');
    }
  }
