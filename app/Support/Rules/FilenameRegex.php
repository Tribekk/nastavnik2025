<?php

namespace Support\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class FilenameRegex implements Rule
{
    protected string $regexp;
    protected ?string $message = null;

    public function __construct(string $regexp = '/^[A-z0-9_.\-()\[\]]*$/', ?string $message = null)
    {
        $this->regexp = $regexp;
        $this->message = $message;
    }

    public function passes($attribute, $value)
    {
        if (!($value instanceof UploadedFile) || !$value->isValid()) {
            return false;
        }

        return preg_match($this->regexp, $value->getClientOriginalName()) > 0;
    }

    public function message()
    {
        return $this->message ?? __('Название загружаемого файла несоответствует формату');
    }
}
