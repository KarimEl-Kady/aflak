<?php

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

return [
    'accepted'             => 'يجب قبول :attribute.',
    'accepted_if'          => 'يجب قبول :attribute في حالة :other يساوي :value.',
    'active_url'           => 'حقل :attribute لا يُمثّل رابطًا صحيحًا.',
    'after'                => 'يجب على حقل :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal'       => 'حقل :attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha'                => 'يجب أن لا يحتوي حقل :attribute سوى على حروف.',
    'alpha_dash'           => 'يجب أن لا يحتوي حقل :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num'            => 'يجب أن يحتوي حقل :attribute على حروفٍ وأرقامٍ فقط.',
    'array'                => 'يجب أن يكون حقل :attribute ًمصفوفة.',
    'before'               => 'يجب على حقل :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal'      => 'حقل :attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date.',
    'between'              => [
        'array'   => 'يجب أن يحتوي حقل :attribute على عدد من العناصر بين :min و :max.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute بين :min و :max.',
        'string'  => 'يجب أن يكون عدد حروف نّص حقل :attribute بين :min و :max.',
    ],
    'boolean'              => 'يجب أن تكون قيمة حقل :attribute إما true أو false .',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل :attribute.',
    'current_password'     => 'كلمة المرور غير صحيحة.',
    'date'                 => 'حقل :attribute ليس تاريخًا صحيحًا.',
    'date_equals'          => 'يجب أن يكون حقل :attribute مطابقاً للتاريخ :date.',
    'date_format'          => 'لا يتوافق حقل :attribute مع الشكل :format.',
    'declined'             => 'يجب رفض :attribute.',
    'declined_if'          => 'يجب رفض :attribute عندما يكون :other بقيمة :value.',
    'different'            => 'يجب أن يكون الحقلان :attribute و :other مُختلفين.',
    'digits'               => 'يجب أن يحتوي حقل :attribute على :digits رقمًا/أرقام.',
    'digits_between'       => 'يجب أن يحتوي حقل :attribute بين :min و :max رقمًا/أرقام .',
    'dimensions'           => 'الحقل:attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => 'للحقل :attribute قيمة مُكرّرة.',
    'email'                => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صحيح البُنية.',
    'ends_with'            => 'يجب أن ينتهي حقل :attribute بأحد القيم التالية: :values',
    'enum'                 => 'حقل :attribute المختار غير صالح.',
    'exists'               => 'القيمة المحددة :attribute غير موجودة.',
    'file'                 => 'الحقل :attribute يجب أن يكون ملفا.',
    'filled'               => 'حقل :attribute إجباري.',
    'gt'                   => [
        'array'   => 'يجب أن يحتوي حقل :attribute على أكثر من :value عناصر/عنصر.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أكبر من :value.',
        'string'  => 'يجب أن يكون طول نّص حقل :attribute أكثر من :value حروفٍ/حرفًا.',
    ],
    'gte'                  => [
        'array'   => 'يجب أن يحتوي حقل :attribute على الأقل على :value عُنصرًا/عناصر.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute على الأقل :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أكبر من :value.',
        'string'  => 'يجب أن يكون طول نص حقل :attribute على الأقل :value حروفٍ/حرفًا.',
    ],
    'image'                => 'يجب أن يكون حقل :attribute صورةً.',
    'in'                   => 'حقل :attribute غير موجود.',
    'in_array'             => 'حقل :attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون حقل :attribute عددًا صحيحًا.',
    'ip'                   => 'يجب أن يكون حقل :attribute عنوان IP صحيحًا.',
    'ipv4'                 => 'يجب أن يكون حقل :attribute عنوان IPv4 صحيحًا.',
    'ipv6'                 => 'يجب أن يكون حقل :attribute عنوان IPv6 صحيحًا.',
    'json'                 => 'يجب أن يكون حقل :attribute نصًا من نوع JSON.',
    'lt'                   => [
        'array'   => 'يجب أن يحتوي حقل :attribute على أقل من :value عناصر/عنصر.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute أصغر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أصغر من :value.',
        'string'  => 'يجب أن يكون طول نّص حقل :attribute أقل من :value حروفٍ/حرفًا.',
    ],
    'lte'                  => [
        'array'   => 'يجب أن لا يحتوي حقل :attribute على أكثر من :value عناصر/عنصر.',
        'file'    => 'يجب أن لا يتجاوز حجم ملف حقل :attribute :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أصغر من :value.',
        'string'  => 'يجب أن لا يتجاوز طول نّص حقل :attribute :value حروفٍ/حرفًا.',
    ],
    'mac_address'          => 'الحقل :attribute يجب أن يكون عنوان MAC صالحاً.',
    'max'                  => [
        'array'   => 'يجب أن لا يحتوي حقل :attribute على أكثر من :max عناصر/عنصر.',
        'file'    => 'يجب أن لا يتجاوز حجم ملف حقل :attribute :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أصغر من :max.',
        'string'  => 'يجب أن لا يتجاوز طول نّص حقل :attribute :max حروفٍ/حرفًا.',
    ],
    'mimes'                => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes'            => 'يجب أن يكون ملفًا من نوع : :values.',
    'min'                  => [
        'array'   => 'يجب أن يحتوي حقل :attribute على الأقل على :min عُنصرًا/عناصر.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أكبر من :min.',
        'string'  => 'يجب أن يكون طول نص حقل :attribute على الأقل :min حروفٍ/حرفًا.',
    ],
    'multiple_of'          => 'حقل :attribute يجب أن يكون من مضاعفات :value',
    'not_in'               => 'عنصر الحقل :attribute غير صحيح.',
    'not_regex'            => 'صيغة حقل :attribute غير صحيحة.',
    'numeric'              => 'يجب على حقل :attribute أن يكون رقمًا.',
    'password'             => 'كلمة المرور غير صحيحة.',
    'present'              => 'يجب تقديم حقل :attribute.',
    'prohibited'           => 'حقل :attribute محظور.',
    'prohibited_if'        => 'حقل :attribute محظور إذا كان :other هو :value.',
    'prohibited_unless'    => 'حقل :attribute محظور ما لم يكن :other ضمن :values.',
    'prohibits'            => 'الحقل :attribute يحظر تواجد الحقل :other.',
    'regex'                => 'صيغة حقل :attribute .غير صحيحة.',
    'required'             => 'حقل :attribute مطلوب.',
    'required_array_keys'  => 'الحقل :attribute يجب أن يحتوي على مدخلات لـ: :values.',
    'required_if'          => 'حقل :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => 'حقل :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => 'حقل :attribute مطلوب إذا توفّر :values.',
    'required_with_all'    => 'حقل :attribute مطلوب إذا توفّر :values.',
    'required_without'     => 'حقل :attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => 'حقل :attribute مطلوب إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق حقل :attribute مع :other.',
    'size'                 => [
        'array'   => 'يجب أن يحتوي حقل :attribute على :size عنصرٍ/عناصر بالضبط.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute :size كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية لـ :size.',
        'string'  => 'يجب أن يحتوي نص حقل :attribute على :size حروفٍ/حرفًا بالضبط.',
    ],
    'starts_with'          => 'يجب أن يبدأ حقل :attribute بأحد القيم التالية: :values',
    'string'               => 'يجب أن يكون حقل :attribute نصًا.',
    'timezone'             => 'يجب أن يكون حقل :attribute نطاقًا زمنيًا صحيحًا.',
    'unique'               => 'قيمة حقل :attribute مُستخدمة من قبل.',
    'uploaded'             => 'فشل في تحميل الـ :attribute.',
    'url'                  => 'صيغة رابط حقل :attribute غير صحيحة.',
    'uuid'                 => 'حقل :attribute يجب أن يكون بصيغة UUID سليمة.',


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
        'user_id' => [
            'exists' => "هذا المستخدم غير مسجل لدينا او غير مفعل بعد , من فضلك حاول مرة اخري في وقت لاحق ونرجو ان تستمتع معنا ",
        ],
        'phone' => [
            'exists' => "هذا :attribute غير مسجل لدينا , هيا قم بالتسجيل لكي تنشر إعلاناتك المميزة ",
        ],
        // 'blocked_phone' => [
        //     'required' => "حقل :attribute مطلوب",
        // ],
        // 'geerbox_type_id' => [
        //     'exists' => "هذا المستخدم غير مسجل لدينا او غير مفعل بعد , من فضلك حاول مرة اخري في وقت لاحق ونرجو ان تستمتع معنا ",
        // ],
        // 'fuel_type_id' => [
        //     'exists' => "هذا المستخدم غير مسجل لدينا او غير مفعل بعد , من فضلك حاول مرة اخري في وقت لاحق ونرجو ان تستمتع معنا ",
        // ],
        // 'counter' => [
        //     'numeric' => "يجب ان يكون عداد الكيلومترات يحتوي علي عدد الكيلومترات رقم ",
        // ],

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
        'image' => 'الصورة',
        'title' => 'الأسم',
        "social_link_facebook" => "رابط الفيسبوك",
        "facebook" => "رابط الفيسبوك",
        "social_link_twitter" => "رابط تويتر",
        "twitter" => "رابط تويتر",
        "social_link_instagram" => "رابط الانستجرام",
        "instagram" => "رابط الانستجرام",
        "social_link_linkedin" => "رابط لينكدان",
        "linkedin" => "رابط لينكدان",
        "title-en" => "اسم القسم باللغة الإنجليزية",
        "title-ar" => "اسم القسم باللغة العربية",
        "text-en" => "النص باللغة الإنجليزية",
        "text-ar" => "النص باللغة العربية",
        "contact_description-en" => " معلومات التواصل باللغة الإنجليزية ",
        "contact_description-ar" => " معلومات التواصل باللغة العربية ",
        "address-en" => "العنوان باللغة الإنجليزية",
        "address-ar" => "العنوان باللغة العربية",
        'our_mission_text-ar' => 'النص التعريفي لمهمتنا باللغة العربية',
        'our_mission_text-en' => 'النص التعريفي لمهمتنا باللغة الانجليزية',

        'our_vision_text-ar' => 'النص التعريفي لرؤيتنا باللغة العربية',
        'our_vision_text-en' => 'النص التعريفي لرؤيتنا باللغة الانجليزية',
        // "" => "",
        "main_contact_email" => "البريد الإلكتروني الرئيسي",
        "second_contact_email" => "البريد الإلكتروني الثاني",
        "main_contact_phone" => "رقم الهاتف الرئيسي",
        "second_contact_phone" => "رقم الهاتف الثاني",
        "main_telegram_userName" => "اسم مستخدم التليجرام",

        "types" => "نوع المشروع",
        "start_date" => "تاريخ بداية المشروع",
        "project_duration" => "مدة المشروع",
        "client_name" => "اسم العميل",
        "contractor_name" => "اسم المقاول|الممول",
        "project_partner_name" => "اسم شريك المشروع",
        "images" => "الصور",

        "voice" => " الملف الصوتي ",
        "section_id" => "القسم",
        "squad_id" => "الفرقة",
        "paper_id" => "المذكرة",
        "subject_id" => "المادة",
        "comment" => "التعليق",
        "status" => "الحالة",
        "word" => "كلمة البحث",
        "password" => "كلمة المرور",
        "phone" => "رقم الهاتف",
        "text_ar" => "النص بالعربية",
        "text_en" => "النص بالانجليزية",
        "name" => "الاسم",
        "email" => "البريد الالكتروني",
        "answer_ar" => "الاجابة بالعربية",
        "answer_en" => "الاجابة بالانجليزية",
        "question_ar" => "السؤال بالعربية",
        "question_en" => "السؤال بالانجليزية",
        "title_ar" => "العنوان بالعربية",
        "title_en" => "العنوان بالانجليزية",
        "image" => "الصورة",
        "price" => "السعر",
        "advertise_id" => " الإعلان المختار ",
        "major_id" => "الفئة الرئيسية",
        "category_id" => "الفئة",
        "sub_category_id" => "الفئة الفرعية",
        "creation_year_id" => "الموديل",
        "geerbox_type_id" => "أنواع الجير",
        "fuel_type_id" => "أنواع الوقود",
        "counter" => "عداد السيارة بالكيلو متر",

        "state" => "المنطقة",
        "state_id" => "المنطقة",
        "city_id" => "المدينة",

        "reason_id" => "السبب",

        "question_id" => "سؤال التواصل",

        "year" => "السنة",
        "rate" => "التقييم ",
        "user_id" => "المستخدم",
        "reason" => "رسالة الإبلاغ ",
        "blocked_phone" => "الهاتف المراد البحث عنه في القائمة السوداء",
        "message" => "الرسالة",
        "apple_app_store" => "متجر اَبل ",
        "google_play_store" => "بلاي ستور",
        "hawai_app_gallery" => "هواوي اب جاليري",
        "" => "",
        "commitment_pay" => "التعهد بدفع عمولة الإعلان",
        "commitment_time_pay" => "التعهد بدفع عمولة الإعلان خلال المدة الزمنية المحددة",
        "prove_image_true" => "التعهد ان الصور المرفوعة لهذا الإعلان",

        // "commerce_activity" => "",
        // "construction_name" => "",
        // "applicant_phone" => "",
        // "applicant_name" => "",
        // "applicant_website" => "",
        // "additional_notes" => "",
        // "receipt" => "",
        // "applicant_email" => "",
        // "applicant_national_id" => "",
        "role name" => "اسم الدور",
        "display_name" => "اسم للعرض",
        "permissions" => "الصلاحيات",

        "ticket_id" => " التذكرة",


    ],

];
