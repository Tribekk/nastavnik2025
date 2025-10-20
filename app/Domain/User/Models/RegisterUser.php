<?php
namespace Domain\User\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterUser {
    protected ?string $code;
    protected ?array $user;

    public function __construct() {
        if(session()->has('registerUser')) {
            $this->code = session('registerUser')->getCode();
            $this->user = session('registerUser')->getUser();
        } else {
            session()->put('registerUser', $this);
        }
    }

    public function storeUser(array $data): void
    {
        $this->user = [
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'uuid' => Str::uuid(),
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
        ];
    }

    public function flush(): void {
        if(session()->has('registerUser')) {
            session()->forget('registerUser');
        }
    }

    public function getUser(): ?array
    {
        return isset($this->user) ? $this->user : null;
    }

    public function hasUser(): bool
    {
        return isset($this->user);
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
