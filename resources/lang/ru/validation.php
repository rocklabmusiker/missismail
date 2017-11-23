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

    'accepted'             => ':attribute должен быть принят.',
    'active_url'           => ':attribute не является допустимым URL.',
    'after'                => ':attribute должен быть датой после :date.',
    'after_or_equal'       => ':attribute должен быть датой после или равной :date.',
    'alpha'                => ':attribute должен содержать только буквы.',
    'alpha_dash'           => ':attribute может содержать только буквы, цифры и тире.',
    'alpha_num'            => ':attribute может содержать только буквы и цифры.',
    'array'                => ':attribute должен быть массивом.',
    'before'               => ':attribute должен быть дата до :date.',
    'before_or_equal'      => ':attribute должен быть дата до или равна :date.',
    'between'              => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file'    => ':attribute должен быть между :min и :max килобайта.',
        'string'  => ':attribute должен быть между :min и :max символов.',
        'array'   => ':attribute должен находиться между :min и :max элементами.',
    ],
    'boolean'              => 'Поле :attribute должно быть истинным или ложным.',
    'confirmed'            => 'Подтверждение :attribute не соответствует.',
    'date'                 => ':attribute недействительная дата',
    'date_format'          => ':attribute dне соответствует формату :format.',
    'different'            => ':attribute и другие должны быть разными.',
    'digits'               => ':attribute должен быть :digits цифр.',
    'digits_between'       => ':attribute должен быть между :min и :max цифрами.',
    'dimensions'           => ':attribute имеет недопустимые размеры изображения.',
    'distinct'             => 'Поле :attribute имеет двойное значение.',
    'email'                => ':attribute должен быть действительным адресом электронной почты.',
    'exists'               => 'Выбранный :attribute недействителен',
    'file'                 => ':attribute должен быть файлом.',
    'filled'               => 'Поле :attribute должно иметь значение.',
    'image'                => ':attribute должен быть изображением.',
    'in'                   => 'Выбранный :attribute недействителен.',
    'in_array'             => 'Поле :attribute не существует в :other.',
    'integer'              => ':attribute должен быть целым числом.',
    'ip'                   => ':attribute должен быть действительным IP-адресом.',
    'ipv4'                 => ':attribute должен быть действительным адресом IPv4.',
    'ipv6'                 => ':attribute должен быть действительным адресом IPv6.',
    'json'                 => ':attribute должен быть допустимой строкой JSON.',
    'max'                  => [
        'numeric' => ':attribute не может быть больше :max.',
        'file'    => ':attribute не может быть больше :max килобайт.',
        'string'  => ':attribute не может быть больше :max символов.',
        'array'   => ':attribute может быть не больше :max элементов.',
    ],
    'mimes'                => ':attribute должен быть файл типа: :values.',
    'mimetypes'            => ':attribute должен быть файл типа: :values.',
    'min'                  => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file'    => ':attribute должен быть не менее :min килобайт.',
        'string'  => ':attribute должен быть не менее :min символов.',
        'array'   => ':attribute должен содержать не менее :min элементов.',
    ],
    'not_in'               => 'Выбранный :attribute недействителен.',
    'numeric'              => ':attribute должен быть числом.',
    'present'              => 'Поле :attribute  должно присутствовать.',
    'regex'                => 'Формат :attribute недействителен.',
    'required'             => 'Поле :attribute обязательно.',
    'required_if'          => 'Поле :attribute требуется, когда :other это :value.',
    'required_unless'      => 'Поле :attribute требуется, если :other находиться в :values.',
    'required_with'        => 'Поле :attribute требуется, когда :values присутствует.',
    'required_with_all'    => 'Поле :attribute требуется, когда :values присутствует.',
    'required_without'     => 'Поле :attribute требуется, когда :values отсутствует.',
    'required_without_all' => 'Поле :attribute требуется, если ни один из :values не присутствует.',
    'same'                 => ':attribute и :other должны совпадать.',
    'size'                 => [
        'numeric' => ':attribute должен быть :size.',
        'file'    => ':attribute должен быть :size килобайт.',
        'string'  => ':attribute должен быть :size символов.',
        'array'   => ':attribute должен содержать :size элементов.',
    ],
    'string'               => ':attribute должен быть строкой.',
    'timezone'             => ':attribute должен быть допустимой временной зоной.',
    'unique'               => ':attribute уже существует.',
    'uploaded'             => ':attribute не удалось загрузить.',
    'url'                  => 'Формат :attribute недействителен.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
