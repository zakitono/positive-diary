<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = Diary::all();

        return view('diary.index', ['diaries' => $diaries]);
    }
}
