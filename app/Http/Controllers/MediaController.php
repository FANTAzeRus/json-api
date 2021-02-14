<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public $list = [
        [
            "author" => "Новости Росатома",
            "authorAvatar" => "user_1.png",
            "title" => "У приложения СМИ обновят дизайн",
            "description" => "Всем привет, зацените новый дизайн приложения для коммуникации внутри Росатома.",
            "content" => "Всем привет, зацените новый дизайн приложения для коммуникации внутри Росатома.",
            "imageUrl" => "news_1.png",
            "datePub" => "2020-08-28 10:00:00",
            "comments" => [
                [
                    "authorName" => "Jane Doe",
                    "authorAvatar" => "user_1.png",
                    "pubDate" => "2020-09-02T11:20",
                    "content" => "Вот это я понимаю!",
                    "rating" => 10
                ],
                [
                    "authorName" => "Susan Doe",
                    "authorAvatar" => "user_2.png",
                    "pubDate" => "2020-09-02T11:22",
                    "content" => "Класс!",
                    "rating" => 4
                ],
                [
                    "authorName" => "Susan Doe",
                    "authorAvatar" => "user_3.png",
                    "pubDate" => "2020-09-02T11:22",
                    "content" => "!!!!!!",
                    "rating" => 14
                ],
                [
                    "authorName" => "Susan Doe",
                    "authorAvatar" => "user_3.png",
                    "pubDate" => "2020-09-02T11:22",
                    "content" => "!!!!!!",
                    "rating" => 34
                ],
                [
                    "authorName" => "Susan Doe",
                    "authorAvatar" => "user_3.png",
                    "pubDate" => "2020-09-02T11:22",
                    "content" => "!!!!!!",
                    "rating" => 4
                ],
            ],
        ],
        [
            "author" => "Новости Росатома",
            "authorAvatar" => "user_1.png",
            "title" => "Глава Росатома А.Е. Лихачев записал очередное видеообращение к сотрудникам отрасли",
            "description" => "26 мая генеральный директор Госкорпорации «Росатом» А.Е. Лихачев записал очередное видеообращение к сотрудникам отрасли.",
            "content" => "26 мая генеральный директор Госкорпорации «Росатом» А.Е. Лихачев записал очередное видеообращение к сотрудникам отрасли.",
            "imageUrl" => "news_2.png",
            "datePub" => "2020-08-28 10:01:15",
            "comments" => [],
        ],
        [
            "author" => "John Doe",
            "authorAvatar" => "user_1.png",
            "title" => "Тестим новости",
            "description" => "Всем привет. Верстаем экраты приложения и тестим отображение новостей!",
            "content" => "Всем привет. Верстаем экраты приложения и тестим отображение новостей!",
            "imageUrl" => "news_3.png",
            "datePub" => "2020-08-28 10:43:21",
            "comments" => [],
        ],
        [
            "author" => "John Doe",
            "authorAvatar" => "user_1.png",
            "title" => "Новости загружаем через API",
            "description" => "Теперь загрузка новостей происходит черз API.",
            "content" => "Теперь загрузка новостей происходит черз API.",
            "imageUrl" => "news_4.png",
            "datePub" => "2020-08-28 10:55:22",
            "comments" => [],
        ],
        [
            "author" => "John Doe",
            "authorAvatar" => "user_1.png",
            "title" => "Пять новостей",
            "description" => "Загружаем, тестируем отображение и скроллинг ноовстей через API.",
            "content" => "Загружаем, тестируем отображение и скроллинг ноовстей через API.",
            "imageUrl" => "news_5.png",
            "datePub" => "2020-08-28 11:02:41",
            "comments" => [],
        ],
        [
            "author" => "John Doe",
            "authorAvatar" => "user_1.png",
            "title" => "Внедряем работу с Stacked",
            "description" => "Расширяем работу приложения, внедряя работу со состояниями через Stacked.",
            "content" => "Расширяем работу приложения, внедряя работу со состояниями через Stacked.",
            "imageUrl" => "news_6.png",
            "datePub" => "2020-08-28 11:55:14",
            "comments" => [],
        ],
    ];

    // "title"=>"Top post 1", userUrl: 'user_1.png', imageUrl: 'hot_1.png'),

    public function getAppConfig()
    {
        $ret = [
            "appName" => "Mobile News App",
            "key1" => 123,
            "key2" => "Test value"
        ];

        return $ret;
    }

    public function getTopNews()
    {
        $ret = [];
        $itemsCount = 5;
        for ($i = 1; $i <= $itemsCount; $i++) {
            $ret[] = [
                "id" => $i,
                "title" => "Top post " . $i,
                "userUrl" => "user_" . $i . ".png",
                "imageUrl" => "hot_" . $i . ".png",
            ];
        }

        return $ret;
    }

    public function getNews()
    {
        $ret = [];
        foreach ($this->list as $k => $v) {
            $ret[] = [
                "id" => $k + 1,
                "userName" => $v['author'],
                "userUrl" => $v['authorAvatar'],
                "title" => $v['title'],
                "body_short" => $v['description'],
                "body_full" => $v['content'],
                "imageUrl" => $v['imageUrl'],
                "comments" => $v['comments']
            ];
        }

        return $ret;
    }

    public function getArticles()
    {
        $ret = [
            [
                "id" => 1,
                "author" => "Новости Росатома",
                "authorAvatar" => "https://randomuser.me/api/portraits/women/10.jpg",
                "title" => "У приложения СМИ обновят дизайн",
                "description" => "Всем привет, зацените новый дизайн приложения для коммуникации внутри Росатома.",
                "content" => "Всем привет, зацените новый дизайн приложения для коммуникации внутри Росатома.",
                "imageUrl" => "https://images.unsplash.com/photo-1530111007210-8602366b0c7c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1445&q=80",
                "datePub" => "2020-08-28 10:00:00"
            ],
            [
                "id" => 2,
                "author" => "Новости Росатома",
                "authorAvatar" => "https://randomuser.me/api/portraits/women/10.jpg",
                "title" => "Глава Росатома А.Е. Лихачев записал очередное видеообращение к сотрудникам отрасли",
                "description" => "26 мая генеральный директор Госкорпорации «Росатом» А.Е. Лихачев записал очередное видеообращение к сотрудникам отрасли.",
                "content" => "26 мая генеральный директор Госкорпорации «Росатом» А.Е. Лихачев записал очередное видеообращение к сотрудникам отрасли.",
                "imageUrl" => "https://images.unsplash.com/photo-1596436810706-a034fd6f9e63?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80",
                "datePub" => "2020-08-28 10:01:15"
            ],
            [
                "id" => 3,
                "author" => "John Doe",
                "authorAvatar" => "https://randomuser.me/api/portraits/women/10.jpg",
                "title" => "Тестим новости",
                "description" => "Всем привет. Верстаем экраты приложения и тестим отображение новостей!",
                "content" => "Всем привет. Верстаем экраты приложения и тестим отображение новостей!",
                "imageUrl" => "https://images.unsplash.com/photo-1568378711447-f5eef04d85b5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1349&q=80",
                "datePub" => "2020-08-28 10:43:21"
            ],
            [
                "id" => 4,
                "author" => "John Doe",
                "authorAvatar" => "https://randomuser.me/api/portraits/women/10.jpg",
                "title" => "Новости загружаем через API",
                "description" => "Теперь загрузка новостей происходит черз API.",
                "content" => "Теперь загрузка новостей происходит черз API.",
                "imageUrl" => "https://images.unsplash.com/photo-1565598469107-2bd14ae7e7e4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1396&q=80",
                "datePub" => "2020-08-28 10:55:22"
            ],
            [
                "id" => 5,
                "author" => "John Doe",
                "authorAvatar" => "https://randomuser.me/api/portraits/women/10.jpg",
                "title" => "Пять новостей",
                "description" => "Загружаем, тестируем отображение и скроллинг ноовстей через API.",
                "content" => "Загружаем, тестируем отображение и скроллинг ноовстей через API.",
                "imageUrl" => "https://images.unsplash.com/photo-1558204387-bb2191b4a2a9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
                "datePub" => "2020-08-28 11:02:41"
            ],
            [
                "id" => 6,
                "author" => "John Doe",
                "authorAvatar" => "https://randomuser.me/api/portraits/women/10.jpg",
                "title" => "Внедряем работу с BLoC",
                "description" => "Расширяем работу приложения, внедряя работу со состояниями через BLoC.",
                "content" => "Расширяем работу приложения, внедряя работу со состояниями через BLoC.",
                "imageUrl" => "https://images.unsplash.com/photo-1597912625679-2755d88b9ca0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80",
                "datePub" => "2020-08-28 11:55:14"
            ],
        ];

        return $ret;
    }
}
