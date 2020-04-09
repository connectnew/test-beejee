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

    'accepted' => ':attribute должно быть принятым.',
    'active_url' => ':attribute должен быть валидным URL-адресом.',
    'after' => 'Поле :attribute должно быть датой после :date.',
    'after_or_equal' => 'Поле :attribute должно быть после или равной дате :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, тире и подчеркивание.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'before' => 'Поле :attribute должно быть датой до :date.',
    'before_or_equal' => 'Поле :attribute должно быть до или равной дате :date.',
    'between' => [
        'numeric' => 'Число :attribute должно быть от :min до :max.',
        'file' => 'Размер :attribute должен быть от :min до :max килобайт.',
        'string' => 'Длина поля :attribute должна быть от :min до :max символов.',
        'array' => 'Поле :attribute должен содержать от :min до :max элементов.',
    ],
    'boolean' => ':attribute поле может быть true или false.',
    'confirmed' => 'Подтверждение поля :attribute не совпадает.',
    'date' => 'Поле :attribute не является допустимой датой.',
    'date_equals' => 'Поле :attribute должно быть равной дате :date.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'different' => 'Поля :attribute и :other должны различаться.',
    'digits' => 'Поле :attribute должно быть :digits числом.',
    'digits_between' => 'Значение поля :attribute должно быть числом в промежутке :min и :max.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute имеет повторное значение.',
    'email' => 'Поле :attribute должно быть email адресом.',
    'ends_with' => 'Поле :attribute должно оканчиваться одним из следующих значений: :values',
    'exists' => 'Значение поля :attribute неверное.',
    'file' => ':attribute должен быть файлом.',
    'filled' => 'Поле :attribute должно иметь значение.',
    'gt' => [
        'numeric' => 'Значение поля :attribute должно быть больше :value.',
        'file' => 'Размер файла :attribute должен быть больше :value килобайт.',
        'string' => 'Длина строки :attribute должна превышать :value символов.',
        'array' => 'Кол-во элементов массива :attribute должно быть больше :value.',
    ],
    'gte' => [
        'numeric' => 'Значение поля :attribute должно быть больше или равным :value.',
        'file' => 'Размер файла :attribute должен быть больше или равным :value килобайт.',
        'string' => 'Длина строки :attribute должна быть равным :value или более символам.',
        'array' => 'Кол-во элементов массива :attribute должно быть равной :value или больше.',
    ],
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Значение поля :attribute неверное.',
    'in_array' => 'Значение поля :attribute отсутствует в :other.',
    'integer' => 'Значение поля :attribute должно быть числом.',
    'ip' => 'Значение поля :attribute должно быть IP адресом.',
    'ipv4' => 'Значение поля :attribute должно быть IPv4 адресом.',
    'ipv6' => 'Значение поля :attribute должно быть IPv6 адресом.',
    'json' => 'Значение поля :attribute должно быть JSON стокой.',
    'lt' => [
        'numeric' => 'Значение поля :attribute должно быть меньше :value.',
        'file' => 'Размер файла :attribute должен быть меньше :value килобайт.',
        'string' => 'Длина строки :attribute должна быть меньше :value символов.',
        'array' => 'Кол-во элементов массива :attribute должно быть меньше :value.',
    ],
    'lte' => [
        'numeric' => 'Значение поля :attribute должно быть меньше или равным :value.',
        'file' => 'Размер файла :attribute должно быть меньше или равным :value килобайт.',
        'string' => 'Длина строки :attribute должно быть равным :value или менее символам.',
        'array' => 'Кол-во элементов массива :attribute должно быть равным :value или менее символам.',
    ],
    'max' => [
        'numeric' => 'Значние поля :attribute не должно превышать :max.',
        'file' => 'Размер файла :attribute не может превышать :max килобайт.',
        'string' => 'Длина строки :attribute не может превышать :max символов.',
        'array' => 'Кол-во элементов в массиве :attribute не должно превышать :max символом.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом типа: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом типа: :values.',
    'min' => [
        'numeric' => 'Значение поля :attribute должно быть больше :min.',
        'date' => 'Значение поля :attribute должно быть больше :min.',
        'file' => 'Размер файла :attribute должен быть больше :min килобайт.',
        'string' => 'Длина строки :attribute должна быть больше :min символов.',
        'array' => 'Кол-во элементов массива :attribute должно быть больше :min.',
    ],
    'not_in' => 'Значение поля :attribute недействительно.',
    'not_regex' => 'Формат поля :attribute неверный.',
    'numeric' => 'Поле :attribute может содержать только цифры.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Формат поля :attribute неверный.',
    'required' => 'Поле :attribute обязательное.',
    'required_if' => 'Поле :attribute обязательное, когда :other имеет значение :value.',
    'required_unless' => 'Поле :attribute является обязательным, если :other не содержит :values.',
    'required_with' => 'Поля :attribute является обязательным, когда присутствует поле :values.',
    'required_with_all' => 'Поле :attribute является обязательным, когда присутствуют значения полей :values.',
    'required_without' => 'Поле :attribute является обязательным, когда значение в одном из полей :values отсутствует.',
    'required_without_all' => 'Поле :attribute является обязательным, когда значения в полях :values отсутствуют.',
    'same' => 'Значение поля :attribute и :other должны совпадать.',
    'size' => [
        'numeric' => 'Значение поля :attribute должно быть равным :size.',
        'file' => 'Размер файла :attribute должен быть равным :size килобайт.',
        'string' => 'Длина строки :attribute должна быть равна :size символам.',
        'array' => 'Кол-во элеметов массива :attribute должно быть равнм :size.',
    ],
    'starts_with' => 'Значение поля :attribute должно начинаться с одного из значений: :values',
    'string' => 'Значение поля :attribute должно быть строкой.',
    'timezone' => 'Значение поля :attribute должно быть допустимой временной зоной.',
    'unique' => 'Значение поля :attribute уже используется.',
    'uploaded' => ':attribute не удалось загрузить.',
    'url' => 'Значение поля :attribute имеет недопустимый формат.',
    'uuid' => 'Значение поля :attribute должно быть допустимым UUID.',

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
    'exists_relation' => 'Отсутствует связь в БД.',
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

    'attributes' => [],

];
