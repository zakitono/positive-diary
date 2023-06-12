<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = Diary::paginate(5);
        // $diaries = Diary::all();

        return view('diary.index', ['diaries' => $diaries]);
    }

    public function detail($id)
    {
        $diary = Diary::find($id);

        return view('diary.detail', ['diary' => $diary]);
    }
}
