<?php

namespace App\Http\Controllers;


use App\News;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class MetaFormController extends Controller
{
    public function init() {
        $ret = [
            "success" => true,
            "meta" => [
                "register" => [
                    "type" => "object",
                    "label" => "Форма регистрации",
                    "button_label" => "Зарегистрироваться",
                    "submit_url" => "/api/meta-form/register",
                    "object" => [
                        "items" => [
                            "name" => [
                                "type" => "string",
                                "label" => "Имя",
                                "params" => [
                                    "min" => "2",
                                    "max" => "20",
                                    "required" => true
                                ]
                            ],

                            "email" => [
                                "type" => "email",
                                "label" => "E-Mail",
                                "params" => [
                                    "min" => "2",
                                    "max" => "20",
                                    "required" => true
                                ]
                            ],

                            "password" => [
                                "type" => "password",
                                "label" => "Пароль",
                                "params" => [
                                    "min" => "2",
                                    "max" => "20",
                                    "required" => true
                                ]
                            ],

                            "password_confirmation" => [
                                "type" => "password",
                                "label" => "Подтверждение пароля",
                                "params" => [
                                    "min" => "2",
                                    "max" => "20",
                                    "required" => true
                                ]
                            ]                            
                        ]
                    ]
                ],

                "login" => [
                    "type" => "object",
                    "label" => "Форма авторизации",
                    "button_label" => "Получить API_TOKEN",
                    "submit_url" => "/api/meta-form/login",
                    "object" => [
                        "items" => [
                            "email" => [
                                "type" => "email",
                                "label" => "E-Mail",
                                "params" => [
                                    "min" => "2",
                                    "max" => "20",
                                    "required" => true,
                                    "default" => "fedor@pisem.net"
                                ]
                            ],

                            "password" => [
                                "type" => "password",
                                "label" => "Пароль",
                                "params" => [
                                    "min" => "2",
                                    "max" => "20",
                                    "required" => true,
                                    "default" => "12345"
                                ]
                            ]
                        ]
                    ]
                ],

                "news" => [
                    "type" => "object",
                    "label" => "Форма добавления новости",
                    "button_label" => "Добавить новость",
                    "submit_url" => "/api/meta-form/news",
                    "object" => [
                        "items" => [
                            "title" => [
                                "type" => "string",
                                "label" => "Заголовок новости",
                                "params" => [
                                    "min" => "5",
                                    "max" => "50",
                                    "required" => true
                                ]
                            ],

                            "body" => [
                                "type" => "text",
                                "label" => "Тело новости",
                                "params" => [
                                    "required" => true
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return $ret;
    }
    
    public function register() {
        $data = request()->all();
        $data['password'] = Hash::make($data['password']);
        $data['remember_token'] = (string) Str::uuid($data['password']);

        try {
            $user = User::create($data);

            return ['success'=>true, "user" => $user];
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function login() {
        $user = User::where('email', request()->email)->first();

        if($user) {
            if(Hash::check(request()->password, $user->password)) {
                return ['success' => true, 'api_token' => $user->remember_token];
            } else {
                return "Ошибка! Пароль задан неверно!";
            }
        } else {
            return "Ошибка! Пользователь не найден!";
        }
    }

    public function news() {
        return News::all();
    }

    public function add_news() {
        $new_item = News::create(request()->all());

        return ['success'=>true, 'add_news' => true,'news' => $new_item];
    }
}
