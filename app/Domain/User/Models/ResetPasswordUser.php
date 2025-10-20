<?php
namespace Domain\User\Models;

class ResetPasswordUser {
    protected ?string $code;
    protected ?int $userId;

    public function __construct() {
        if(session()->has('resetPasswordUser')) {
            $this->code = session('resetPasswordUser')->getCode();
            $this->userId = session('resetPasswordUser')->getUserId();
        } else {
            session()->put('resetPasswordUser', $this);
        }
    }

    public function setUserId(int $id): void
    {
        $this->userId = $id;
        session()->put('resetPasswordUser', $this);
    }

    public function flush(): void {
        if(session()->has('resetPasswordUser')) {
            session()->forget('resetPasswordUser');
        }
    }

    public function getUserId(): ?int
    {
        return isset($this->userId) ? $this->userId : null;
    }

    public function hasUserId(): bool
    {
        return isset($this->userId);
    }

    public function getCode(): string
    {
        return isset($this->code) ? $this->code : $this->generateCode();
    }

    protected function generateCode(): string
    {
        return $this->code = numerify(4);
    }
}
