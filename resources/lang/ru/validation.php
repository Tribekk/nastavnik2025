<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'В поле :attribute должна быть дата после :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => ':attribute может содержать только буквы, цифры, тире и нижнее подчеркивание.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => 'The :attribute must be an array.',
    'before' => 'В поле :attribute должна быть дата раньше :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'Подтверждение не совпадает с полем :attribute.',
    'date' => ':attribute содержит некорректное значение даты.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'Поле :attribute не соответствует формату.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'Поле :attribute должно иметь :digits знаков.',
    'digits_between' => 'Поле :attribute должно иметь от :min до :max знаков.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'Пожалуйста, укажите корректный адрес :attribute.',
    'exists' => 'Указанное значение поля :attribute не является корректным.',
    'file' => ':attribute должно быть файлом.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Указанное значение поля :attribute не является корректным.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'Поле :attribute должно быть числом.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute не может быть больше :max.',
        'file' => 'Размер файла :attribute не должен превышать :max Килобайт.',
        'string' => 'Поле :attribute не должно содержать более :max символов.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'Файл :attribute должен быть одного из следующих типов: :values.',
    'mimetypes' => 'Файл :attribute должен быть одного из следующих типов: :values.',
    'min' => [
        'numeric' => ':attribute должен содержать не меньше :min символов.',
        'file' => ':attribute должен содержать не меньше :min Кб.',
        'string' => ':attribute должен содержать не меньше :min символов.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'Указанное значение поля :attribute не является корректным.',
    'not_regex' => 'Поле :attribute имеет неверный формат.',
    'numeric' => 'Поле :attribute должно быть числовым.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'Поле :attribute имеет неверный формат.',
    'required' => 'Поле :attribute является обязательным.',
    'required_if' => 'Поле :attribute является обязательным when :other is :value.',
    'required_unless' => 'Поле :attribute является обязательным до тех пор пока :other is in :values.',
    'required_with' => 'Поле :attribute является обязательным when :values is present.',
    'required_with_all' => 'Поле :attribute является обязательным when :values are present.',
    'required_without' => 'Поле :attribute является обязательным when :values is not present.',
    'required_without_all' => 'Поле :attribute является обязательным when none of :values are present.',
    'same' => 'Поля :attribute и :other должны совпадать.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'Выбранное значение параметра :attribute уже используется.',
    'uploaded' => 'Не получилось загрузить :attribute.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'last_name' => '«фамилия»',
        'first_name' => '«имя»',
        'middle_name' => '«отчество»',
        'password' => '«пароль»',
        'new_password' => '«новый пароль»',
        'current_password' => '«текущий пароль»',
        'phone' => '«телефон»',
        'birth_date' => '«дата рождения»',
        'pd_agree' => '«согласие на обработку ПД»',
        'know_pk' => '«ознакомление с политикой»',
        'agree_notify' => '«согласие на уведомления»',
        'token' => '«токен»',
        'title' => '«название»',
        'description' => '«описание»',
        'scan' => '«скан»',
        'email' => '«e-mail»',
        'roles.*.name' => '«роль»',
        'new_avatar' => '«аватар»',
        'avatar' => '«аватар»',
        'short_title' => '«сокращенное название»',
        'address' => '«адрес»',
        'type_of_educational_organization_id' => '«отрасль деятельности компании»',
        'loyalty_level_id' => '«уровень лояльности»',
        'sex' => '«пол»',
        'school_id' => "«компания»",
        'class_id' => "« структурное подразделение»",
        'orgunit_id' => "«организация»",
    ],

    'values' => [
        'birth_date' => [
            'today'     => 'текущей даты',
        ],
    ],

];
