<?php

namespace App\Http\Livewire;

use App\Models\degree;
use App\Models\question;
use Livewire\Component;

class StudentsQuestions extends Component
{
    public $exam_id,
        $questions,
        $counter = 0,
        $student_id,
        $question_count = 0;

    public function render()
    {
        $this->questions = question::where('exam_id', $this->exam_id)->get();
        $this->question_count = $this->questions->count();
        return view('livewire.students-questions', ['questions']);
    }
    public function nextquestion($question_id, $score, $answer, $right_answer)
    {
        $degrees = degree::where('student_id', $this->student_id)
            ->where('exam_id', $this->exam_id)
            ->first();
        if ($degrees == null) {
            $degree = new degree();
            $degree->exam_id = $this->exam_id;
            $degree->question_id = $question_id;
            $degree->student_id = $this->student_id;
            if ($answer == $right_answer) {
                $degree->score += $score;
            } else {
                $degree->score += 0;
            }
            $degree->date = date('Y-m-d');
            $degree->save();
        } else {
            if ($answer == $right_answer) {
                $degrees->score += $score;
            } else {
                $degrees->score += 0;
            }
            $degrees->question_id = $question_id;
            $degrees->save();
        }

        if ($this->question_count - 1 > $this->counter) {
            $this->counter++;
        } else {
            flash()->addsuccess(trans('exams.Test completed successfully'));
            return redirect()->route('the_exams');
        }
    }
}
