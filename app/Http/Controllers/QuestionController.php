<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Exam;
use App\Models\ExamsItem;
use App\Models\Lesson;
use App\Models\Member;
use App\Models\Question;
use Auth;
use Cart;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lessonId)
    {
        $oldExam = Exam::where(['memberId' => Auth::user()->id, 'lessonId' => $lessonId, 'isFinish' => false])->first();
        if ($oldExam != null) {
            $cart = Cart::name('exams');
            $cart->destroy();

            $oldData = ExamsItem::where('examId', $oldExam->id)->get();
            $cart = Cart::name('exams');
            foreach ($oldData  as $value) {
                $choice = Choice::find($value->choiceId);

                $cart->addItem([
                    'id'       => $value->questionId, //questionId
                    'title'    => $choice->name, // name in choice table
                    'quantity' => 1,
                    'price'    => $value->score,
                    'extra_info' => [
                        'questionId' => $value->questionId,
                        'choiceId' => $value->choiceId,
                        'score' => $value->score,
                        'isRight' => $value->isRight
                    ]
                ]);
            }
        } else {
            // check in cart
            $cart = Cart::name('exams');
            $items = $cart->getDetails()->get('items');
            foreach ($items as $hash => $item) {
                $questionId = $item->extra_info->questionId;
                $thisLesson = Question::find($questionId)->lessonId;
                if ($thisLesson != $lessonId) {
                    $cart->removeItem($hash);
                }
            }
        }

        return view('question', [
            'title' => Lesson::find($lessonId)->name . ': ทำแบบทดสอบ',
            'lesson' => Lesson::find($lessonId),
            'data' => Question::with('choices')->where('lessonId', $lessonId)->get()
        ]);
    }

    public function setCart(Request $request)
    {
        $choice = Choice::find($request->choiceId);
        $question = Question::find($choice->questionId);
        $score = $choice->isRight ? $question->score : 0;

        $cart = Cart::name('exams');
        // check
        $hasItem = count($cart->getItems(['id' => $choice->questionId])) == 0 ? false : true;
        if (!$hasItem) {
            $cart->addItem([
                'id'       => $choice->questionId, //questionId
                'title'    => $choice->name, // name in choice table
                'quantity' => 1,
                'price'    => $score,
                'extra_info' => [
                    'questionId' => $choice->questionId,
                    'choiceId' => $choice->id,
                    'score' => $score,
                    'isRight' => $choice->isRight
                ]
            ]);
        } else {
            $oldValue = $cart->getItems(['id' => $choice->questionId]);
            $preKey = array_keys($oldValue);
            $key = $preKey[0];
            $cart->updateItem($key, [
                'extra_info' => [
                    'questionId' => $choice->questionId,
                    'choiceId' => $choice->id,
                    'score' => $score,
                    'isRight' => $choice->isRight
                ]
            ]);
        }
        return $cart->getDetails()->toJson();
    }

    public function submitCart($lessonId)
    {
        $cart = Cart::name('exams');
        $items = $cart->getDetails()->get('items');

        $exam = Exam::where(['memberId' => Auth::user()->id, 'lessonId' => $lessonId, 'isFinish' => false])->first();
        if ($exam != null) {
            $remove = Exam::findOrFail($exam->id);
            $remove->delete();
        }
        $exam = new Exam();
        $exam->memberId = Auth::user()->id;
        $exam->lessonId = $lessonId;
        $exam->score = 0;
        $exam->save();
        // add item
        foreach ($items as $hash => $item) {
            $data = new ExamsItem();
            $data->examId = $exam->id;
            $data->questionId = $item->extra_info->questionId;
            $data->choiceId = $item->extra_info->choiceId;
            $data->score = $item->extra_info->score;
            $data->isRight = $item->extra_info->isRight;
            $data->save();
        }
        // update exam
        $lesson = Lesson::find($lessonId);
        $fullScore = Question::where('lessonId', $lesson->id)->sum('score');
        $passScore = ($fullScore * $lesson->passScore) / 100;
        $sumScore = ExamsItem::where('examId', $exam->id)->sum('score');

        $exam->score = $sumScore;
        $exam->isPass = $sumScore >= $passScore ? true : false;
        $exam->isFinish = true;
        $exam->save();

        $cart->destroy();
        $this->checkStatusMember();

        return  redirect()->route('question.result', ['examId' => $exam->id]);
    }

    public function saveCart($lessonId)
    {
        $cart = Cart::name('exams');
        $items = $cart->getDetails()->get('items');

        $exam = Exam::where(['memberId' => Auth::user()->id, 'lessonId' => $lessonId, 'isFinish' => false])->first();

        if ($exam != null) {
            $remove = Exam::findOrFail($exam->id);
            $remove->delete();
        }

        $exam = new Exam();
        $exam->memberId = Auth::user()->id;
        $exam->lessonId = $lessonId;
        $exam->score = 0;
        $exam->save();
        // add item
        foreach ($items as $hash => $item) {
            $data = new ExamsItem();
            $data->examId = $exam->id;
            $data->questionId = $item->extra_info->questionId;
            $data->choiceId = $item->extra_info->choiceId;
            $data->score = $item->extra_info->score;
            $data->isRight = $item->extra_info->isRight;
            $data->save();
        }
        // update exam
        $lesson = Lesson::find($lessonId);
        $fullScore = Question::where('lessonId', $lesson->id)->sum('score');
        $passScore = ($fullScore * $lesson->passScore) / 100;
        $sumScore = ExamsItem::where('examId', $exam->id)->sum('score');

        $exam->score = $sumScore;
        $exam->isPass = $sumScore >= $passScore ? true : false;
        $exam->isFinish = false;
        $exam->save();

        $cart->destroy();

        return  redirect()->route('home');
    }

    public function result($examId)
    {
        $member = Member::findOrFail(Auth::user()->id);
        $exam = Exam::findOrFail($examId);
        $lesson = Lesson::findOrFail($exam->lessonId);

        $title = "Result";
        if (!$member->passed) {
            $title = "Result: " . $lesson->name;
        }

        return view('result', [
            'title' => $title,
            'member' => $member,
            'exam' => $exam,
            'lesson' => $lesson,
            'maxScore' => Question::where('lessonId', $lesson->id)->sum('score'),
            'countRight' => ExamsItem::where(['examId' => $exam->id, 'isRight' => true])->count(),
        ]);
    }

    public function checkStatusMember()
    {
        $preCheck = array();
        $lesson = Lesson::where('status', true)->get();
        foreach ($lesson as $value) {
            $data = Exam::where(['memberId' =>  Auth::user()->id, 'lessonId' => $value->id, 'isPass' => true])->first();
            if ($data != null) {
                array_push($preCheck, true);
            } else {
                array_push($preCheck, false);
            }
        }
        $member = Member::findOrFail(Auth::user()->id);
        if (!in_array(false, $preCheck)) {
            $member->passed = true;
            $member->save();
        }
        return $member->passed;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
