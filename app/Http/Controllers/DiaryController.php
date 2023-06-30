<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Http\Requests\DiaryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    public function index(Request $request)
    {
        // $diaries = Diary::paginate(5);
        // // $diaries = Diary::all();
        // return view('diary.index', ['diaries' => $diaries]);

        $input = $request->only('note', 'note01', 'note02');
        $diaries = Auth::user()->diaries()->search($input)->orderBy('id', 'desc')->paginate(10);

        return view(
            'diary.index',
            [
                'diaries' => $diaries,

                // 検索する値
                'note' => $input['note'] ?? '',
            ]
        );
    }

    public function detail($id)
    {
        $diary = Diary::find($id);

        if (!$diary) {
            return abort(404);
        }

        return view('diary.detail', ['diary' => $diary]);
    }

    public function edit($id)
    {
        $diary = Diary::find($id);

        if (!$diary) {
            return abort(404);
        }

        return view('diary.edit', ['diary' => $diary]);
    }

    public function update(DiaryRequest $request)
    {
        try {
            DB::beginTransaction();
            $diary = Diary::find($request->input('id'));
            $diary->date = $request->input('date');
            $diary->note = $request->input('note');
            $diary->note01 = $request->input('note01');
            $diary->note02 = $request->input('note02');
            $diary->user_id = Auth::id();
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
            $validated = Validator::make($request->all(), [
                'date' => 'required|date',
                'note' => 'max: 255',
                'note01' => 'max: 255',
                'note02' => 'max: 255',
            ]);

            if ($validated->fails()) {
                return redirect()->route('diary.new', ['id' => $request->input('id')])->withErrors($validated)->withInput();
            }

            Auth::user()->diaries()->create($request->all());
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
