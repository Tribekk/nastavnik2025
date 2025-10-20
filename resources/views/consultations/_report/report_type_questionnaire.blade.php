@include('consultations._report.questionnaire._table')

<div class="mt-18 button-group">
    <a target="_blank" href="{{ route('quiz.results.student_questionnaire', $consultation->child)."?backTo=".urlencode(url()->full()."#report-tab") }}" class="btn btn-outline-success">Посмотреть анкету наставника</a>
    @if($consultation->parent)
        <a target="_blank" href="{{ route('quiz.results.parent_questionnaire', $consultation->parent)."?backTo=".urlencode(url()->full()."#report-tab") }}" class="btn btn-outline-success">Посмотреть анкету родителя</a>
    @endif
</div>
