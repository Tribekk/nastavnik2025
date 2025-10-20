<?php

namespace Domain\Orgunit\Actions;

use Domain\Orgunit\Models\ExternalOrgunit;
use Domain\User\Actions\AssignRole;
use Domain\User\Actions\CreateUser;
use Domain\User\Catalogs\BaseUserRole\EmployerRoleCatalogItem;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateExternalOrgunitAction
{
    public function run(array $data = [], $request): ExternalOrgunit
    {
        DB::transaction(function() use (&$orgunit, $data, $request) {


            $orgunit = ExternalOrgunit::create([
                'uuid' => $data['uuid'] ?? Str::uuid(),
                'title' => $data['title'],
                'short_title' => $data['short_title'] ?? null,
                'legal_form_id' => $data['legal_form_id'],
                'parent_id' => $data['parent_id'] ?? null,
                'legal_address' => $data['legal_address'],
                'fact_address' => $data['fact_address'],
                'description' => $data['description'] ?? null,
                'personal_quiz' => 'a:8:{s:18:"quiz_question_text";a:1:{i:1;N;}s:18:"type_quiz_question";a:1:{i:1;s:11:"one_variant";}s:13:"quiz_variants";a:1:{i:1;N;}s:12:"quiz_answers";a:1:{i:1;N;}s:10:"video_link";a:1:{i:1;N;}s:10:"quiz_title";N;s:16:"quiz_description";N;s:14:"answer_bucklet";N;}',
                'personal_page_address' => '',
                'landing_type' => 1,
                'landing_template' => 1,
                'ftp_access' => '',
                'landing_address' => '',
                'quiz_bucklet' => '',
                'profile_name' => '',
                'profile_target' => '',
                'search_location' => serialize($data['search_location'])  ?? null,
                'code_access' => $this->gen_code_access(),
            ]);

            if(isset($data['logo'])) {
                $filename = $data['logo']->store('/'.$orgunit->id, 'external_orgunits');

                $orgunit->logo()->create([
                    'uuid' => Str::uuid(),
                    'filename' => $filename,
                    'disk' => 'external_orgunits',
                ]);
            }

            foreach ($data['activity_kind_id'] as $id) {
                $orgunit->activityKinds()->create([
                    'uuid' => Str::uuid(),
                    'activity_kind_id' => $id
                ]);
            }



            $isEmployerExist = User::all()->where('phone',$data['phone']);


            if($isEmployerExist->isEmpty()) {


                $employerData=array(
                    'last_name'=>$data['last_name'],
                    'first_name'=>$data['first_name'],
                    'middle_name'=>$data['middle_name'],
                    'birth_date'=>$data['birth_date'],
                    'personal_quiz_description' => null,
                    'sex'=>$data['sex'],
                    'phone'=>$data['phone'],
                    'password'=>\Hash::make("12345"),
                );

                ////добавляем работодателя
                $createUserActionEmployer = new CreateUser();
                $userEmployer = $createUserActionEmployer->run($employerData);

                $assignRoleActionEmployer = new AssignRole();
                $assignRoleActionEmployer->run($userEmployer, new EmployerRoleCatalogItem(), $request);
                $userEmployer['phone_verified_at'] = now();
                $userEmployer->orgunit_id=$orgunit->id;
                $userEmployer->update();

                $userEmployer->update([
                    'password' => \Hash::make("12345"),
                    'reset_password_code' => null,
                    'remember_token' => Str::random(60),
                ]);

                $message1="[sms на номер ".$data['phone']."] \r\n\r\nЗдравствуйте ".$data['first_name']." ".$data['last_name']." ".$data['middle_name']." !\r\n\r\n Вы зарегистрированы в системе как ответственный от организации \"".$data['title']."\", ваш логин ".$data['phone'].", ваш пароль - 12345";


//               $this->send_to_telegram($message1, -748612099);

            } else {
                return back()->withErrors(['msg'=>'Такой ответственный работодателя уже существует в системе!'])->withInput();
            }

        });

        return $orgunit;
    }


    public function send_to_telegram($message,$chatId="-1001380411800") {


        $botToken="5309137610:AAGGvy5xWJUpsNDu0Fi0_QWfN-EAx6hy6Ng";


        $website="https://api.telegram.org/bot".$botToken;
        //** ===>>>NOTE: this chatId MUST be the chat_id of a person, NOT another bot chatId !!!**
        $params=[
            'chat_id'=>$chatId,
            'text'=>$message,
        ];
        $ch = curl_init($website . '/sendMessage');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        ////dd($result);
        curl_close($ch);
        return  $result;

    }

    public function gen_password($length = 6)
    {
        $password = '';
        $arr = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
        );

        for ($i = 0; $i < $length; $i++) {
            $password .= $arr[random_int(0, count($arr) - 1)];
        }
        return $password;
    }

    public function gen_code_access()
    {
        $result = $this->gen_password(4).'-'.$this->gen_password(4);

        return $result;
    }

}

