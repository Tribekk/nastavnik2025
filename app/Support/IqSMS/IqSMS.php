<?php

namespace Support\IqSMS;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\UnauthorizedException;

class IqSMS
{
    protected string $host;
    protected int $port;
    protected string $login;
    protected string $password;
    protected ?string $sender;
    protected ?string $wapUrl;

   public function __construct()
   {
        $this->host = env("IQSMS_HOST", "gate.iqsms.ru");
        $this->port = env("IQSMS_PORT", 80);
        $this->login = env("IQSMS_LOGIN", "");
        $this->password = env("IQSMS_PASSWORD", "");
   }

    /**
     * @param string $phone
     * @param string $message
     * @param string|null $sender
     * @param string|null $wapUrl
     * @return Response
     * @throws Exception
     */
    public function send(string $phone, string $message, ?string $sender = null, ?string $wapUrl = null)
    {
        $params = [
            'phone' => $phone,
            'text' => $message,
        ];

        if($wapUrl) $params['wapurl'] = $wapUrl;
        if($sender) $params['sender'] = $sender;

        $response = Http::withHeaders(['Authorization' => $this->authorizationBasic()])
            ->get($this->fullUrl("send"), $params);


        $this->handleErrors($response);

        return $response;
    }

    private function authorizationBasic(): string {
        return "Basic " . base64_encode($this->login. ":" . $this->password) . "\n";
    }

    private function fullUrl(string $url): string {
       return trim($this->host, '/') . ":" . $this->port . "/" . trim($url, '/');
    }

    /**
     * @param Response $response
     * @throws Exception
     */
    protected function handleErrors(Response $response)
    {
        if ($response->failed()) {
            throw new Exception(UnauthorizedException::class);
        }

        if ($response->body() === "invalid mobile phone") {
            throw new \InvalidArgumentException('Invalid mobile phone', ErrorCode::INVALID_PHONE);
        }

        if ($response->body() === "sender address invalid") {
            throw new \InvalidArgumentException('Invalid sender address', ErrorCode::INVALID_SENDER);
        }

        if ($response->body() === "wapurl invalid") {
            throw new \InvalidArgumentException('Invalid wapurl', ErrorCode::INVALID_WARURL);
        }

        if($response->body() === "text is empty") {
            throw new \InvalidArgumentException('A text cannot be empty', ErrorCode::TEXT_EMPTY);
        }

        if($response->body() === "not enough credits") {
            throw new \InvalidArgumentException('Not enough credits', ErrorCode::NOT_ENOUGH_CREDITS);
        }

        if($response->body() === "invalid schedule time format") {
            throw new \InvalidArgumentException('Invalid schedule time format', ErrorCode::INVALID_SCHEDULE_TIME);
        }

        if($response->body() === "invalid status queue name") {
            throw new \InvalidArgumentException('Invalid status queue name', ErrorCode::INVALID_STATUS_QUEUE);
        }
    }
}
