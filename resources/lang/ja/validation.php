<?php

return [

    /*
    |--------------------------------------------------------------------------
    | バリデーション言語行
    |--------------------------------------------------------------------------
    |
    | 以下の言語行はバリデタークラスにより使用されるデフォルトのエラー
    | メッセージです。サイズルールのようにいくつかのバリデーションを
    | 持っているものもあります。メッセージはご自由に調整してください。
    |
    */

    "accepted"             => ":attributeを承認してください。",
    "active_url"           => ":attributeが有効なURLではありません。",
    "after"                => ":attributeには、:date以降の日付を指定してください。",
    "alpha"                => ":attributeはアルファベッドのみがご利用できます。",
    "alpha_dash"           => ":attributeは英数字とダッシュ(-)及び下線(_)がご利用できます。",
    "alpha_num"            => ":attributeは英数字がご利用できます。",
    "array"                => ":attributeは配列でなくてはなりません。",
    "before"               => ":attributeには、:date以前の日付をご利用ください。",
    "between"              => [
        "numeric" => ":attributeは、:minから:maxの間で指定してください。",
        "file"    => ":attributeは、:min kBから、:max kBの間で指定してください。",
        "string"  => ":attributeは、:min文字から、:max文字の間で指定してください。",
        "array"   => ":attributeは、:min個から:max個の間で指定してください。",
    ],
    "boolean"              => ":attributeは、trueかfalseを指定してください。",
    "confirmed"            => ":attributeと、確認フィールドとが、一致していません。",
    "date"                 => ":attributeには有効な日付を指定してください。",
    "date_format"          => ":attributeは:format形式で指定してください。",
    "different"            => ":attributeと:otherには、異なった内容を指定してください。",
    "digits"               => ":attributeは:digits桁で指定してください。",
    "digits_between"       => ":attributeは:min桁から:max桁の間で指定してください。",
    "email"                => ":attributeには、有効なメールアドレスを指定してください。",
    "filled"               => ":attributeは必ず指定してください。",
    "exists"               => "選択された:attributeは正しくありません。",
    "image"                => ":attributeには画像ファイルを指定してください。",
    "in"                   => "選択された:attributeは正しくありません。",
    "integer"              => ":attributeは整数でご指定ください。",
    "ip"                   => ":attributeには、有効なIPアドレスをご指定ください。",
    "max"                  => [
        "numeric" => ":attributeには、:max以下の数字をご指定ください。",
        "file"    => ":attributeには、:max kB以下のファイルをご指定ください。",
        "string"  => ":attributeは、:max文字以下でご指定ください。",
        "array"   => ":attributeは:max個以下ご指定ください。",
    ],
    "mimes"                => ":attributeには:valuesタイプのファイルを指定してください。",
    "min"                  => [
        "numeric" => ":attributeには、:min以上の数字をご指定ください。",
        "file"    => ":attributeには、:min kB以上のファイルをご指定ください。",
        "string"  => ":attributeは、:min文字以上でご指定ください。",
        "array"   => ":attributeは:min個以上ご指定ください。",
    ],
    "not_in"               => "選択された:attributeは正しくありません。",
    "numeric"              => ":attributeには、数字を指定してください。",
    "regex"                => ":attributeに正しい形式をご指定ください。",
    "required"             => ":attributeは必ず指定してください。",
    "required_if"          => ":otherが:valueの場合、:attributeも指定してください。",
    "required_with"        => ":valuesを指定する場合は、:attributeも指定してください。",
    "required_with_all"    => ":valuesを指定する場合は、:attributeも指定してください。",
    "required_without"     => ":valuesを指定しない場合は、:attributeを指定してください。",
    "required_without_all" => ":valuesのどれも指定しない場合は、:attributeを指定してください。",
    "same"                 => ":attributeと:otherには同じ値を指定してください。",
    "size"                 => [
        "numeric" => ":attributeは:sizeを指定してください。",
        "file"    => ":attributeのファイルは、:sizeキロバイトでなくてはなりません。",
        "string"  => ":attributeは:size文字で指定してください。",
        "array"   => ":attributeは:size個ご指定ください。",
    ],
    "unique"               => ":attributeの値は既に存在しています。",
    "url"                  => ":attributeに正しい形式をご指定ください。",
    "timezone"             => ":attributeには、有効なゾーンをご指定ください。",

    /*
    |--------------------------------------------------------------------------
    | Custom バリデーション言語行
    |--------------------------------------------------------------------------
    |
    | "属性.ルール"の規約でキーを指定することでカスタムバリデーション
    | メッセージを定義できます。指定した属性ルールに対する特定の
    | カスタム言語行を手早く指定できます。
    |
    */

    'custom' => [
        '属性名' => [
            'ルール名' => 'カスタムメッセージ',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション属性名
    |--------------------------------------------------------------------------
    |
    | 以下の言語行は、例えば"email"の代わりに「メールアドレス」のように、
    | 読み手にフレンドリーな表現でプレースホルダーを置き換えるために指定する
    | 言語行です。これはメッセージをよりきれいに表示するために役に立ちます。
    |
    */

    'attributes' => [
        'title'        =>'タイトル',
        'body'      =>'本文',
        'comment' => 'コメント',
    ],

];
