<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;

class StatController extends Controller
{
    public function init() {
        return "Init...";
    }

    public function views() {
        $ret = DB::connection('stat')->select("
        WITH stats AS (
            SELECT
                REGEXP_REPLACE(s.options,'[^[[:digit:]]]*', '', 'g')::INTEGER as postId,
                s.create::DATE as date,
                s.id

            FROM public.stat as s
            WHERE s.event = 'ARTICLE_OPEN'
            and s.create::DATE BETWEEN '2020-05-15' AND '2020-05-20'
        ),

        dates AS (
            SELECT DISTINCT date FROM stats
         ),

        posts AS (
            SELECT DISTINCT postId FROM stats
        )

        SELECT
            t.postId, a.title, t.date, t.views
        FROM (
            SELECT p.postId, d.date, COUNT(s.id) as views
            FROM dates as d
            CROSS JOIN posts as p
            LEFT OUTER JOIN stats s ON s.postId=p.postId AND s.date=d.date
            GROUP by p.postId, d.date--, a.title
        ) as t
        JOIN public.article as a ON(a.id = t.postId)
        ORDER BY t.date ASC
        ");

        return $ret;
    }
}
