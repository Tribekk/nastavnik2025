<?php

namespace App\View\Components;

use Auth;
use Domain\Quiz\Models\AvailableQuiz;
use Illuminate\View\Component;

class Subheader extends Component
{
    public string $title;

    public ?AvailableQuiz $availableQuiz;

    public bool $withProgress;

    public int $margin;

    private static int $DEFAULT_MARGIN = 10;

    public function __construct(string $title, bool $withProgress = false, AvailableQuiz $availableQuiz = null)
    {
        $this->title = $title;
        $this->withProgress = $withProgress;
        $this->availableQuiz = $availableQuiz;

        $this->margin = $this->calculateMargin();
    }

    public function render()
    {
        return view('components.subheader');
    }

    private function calculateMargin(): int
    {
        if ($this->withProgress && $this->availableQuiz->quiz->filledPercentage(Auth::user()) > 0) {
            return $this->availableQuiz->quiz->filledPercentage(Auth::user());
        }

        return self::$DEFAULT_MARGIN;
    }
}
