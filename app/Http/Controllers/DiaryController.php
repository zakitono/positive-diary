<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function edit($id)
    {
        $diary = Diary::find($id);

        return view('diary.edit', ['diary' => $diary]);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $diary = Diary::find($request->input('id'));
            $diary->date = $request->input('date');
            $diary->note = $request->input('note');
            $diary->note01 = $request->input('note01');
            $diary->note02 = $request->input('note02');
            $diary->save();
            DB::commit();
            return redirect('diary')->with('status', '内容を更新しました。');
        } catch (\Exception $ex) {
            DB::rollback();
            logger($ex->getMessage());
            return redirect('diary')->withErrors($ex->getMessage());
        }
    }

    public function new()
    {
        return view('diary.new');
    }

    public function create(Request $request)
    {
        try {
            Diary::create($request->all());
            return redirect('diary')->with('status', '日記を登録しました');
        } catch (\Exception $ex) {
            logger($ex->getMessage());
            return redirect('diary')->withErrors($ex->getMessage());
        }
    }

    public function remove($id)
    {
        try {
            Diary::find($id)->delete();
            return redirect('diary')->with('status', '日記を削除しました。');
        } catch (\Exception $ex) {
            logger($ex->getMessage());
            return redirect('diary')->withErrors($ex->getMessage());
        }
    }
}
