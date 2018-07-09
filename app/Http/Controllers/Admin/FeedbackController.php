<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\FeedbackRepository;
use Validator;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FeedbackRepository $repository)
    {
        $lists = $repository->lists();
        $data = [
            'lists' => $lists,
        ];
        return admin_view('feedback.index', $data);
    }

    public function getIndex(FeedBackRepository $repository)
    {
        $lists = $repository->lists();
        $data = [
            'lists' => $lists,
        ];
        return admin_view('feedback.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return admin_view('feedback.create');
    }

    protected function validate_create($data)
    {
        return Validator::make($data, [
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
    }

    public function postCreate(Request $request, FeedbackRepository $repository)
    {
        $data = $request->all();

        $validator = $this->validate_create($data);
        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }

        $result = $repository->create($data);
        if ($result) {
            return redirect()->route('Feedback.getIndex');
        } else {
            return back()->withErrors('创建失败')->withInput();
        }
    }

    public function getDelete(Request $request, FeedbackRepository $repository)
    {
        $feedback = $repository->find($request->id);
        if (!$feedback) {
            return redirect()->route('Feedback.getIndex')->withErrors('用户不存在');
        }
        if ($feedback->id == 1) {
            return redirect()->route('Feedback.getIndex')->withErrors('内置无法删除');
        }

        $result = $feedback->delete();
        if ($result) {
            return redirect()->route('Feedback.getIndex')->with('Message', '删除成功');
        } else {
            return redirect()->route('Feedback.getIndex')->withErrors('删除失败');
        }
    }
}
