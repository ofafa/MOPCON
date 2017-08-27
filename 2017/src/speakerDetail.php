<?php
function getAllSpeakerDetail($speaker)
{
    $google_data = json_decode(file_get_contents("https://spreadsheets.google.com/feeds/list/1KrS_FkyR12dKG9apshDo-Ba0HoR6rO_EJ41hxy-0EZk/1/public/values?alt=json"), true);
    $google_data = $google_data['feed']['entry'];

    foreach ($google_data as $item) {
        $lang_zh[$item['gsx$講者編號']['$t']] = [
            'name'     => $item['gsx$姓名']['$t'],
            'type'     => $item['gsx$類別']['$t'],
            'job'      => $item['gsx$職稱']['$t'],
            'info'     => $item['gsx$個人介紹']['$t'],
            'picture'  => $item['gsx$照片']['$t'],
            'facebook' => $item['gsx$facebook']['$t'],
            'github'   => $item['gsx$github']['$t'],
            'blog'     => $item['gsx$blog']['$t'],
            'website'  => $item['gsx$website']['$t'],
            'linkedin' => $item['gsx$linkedin']['$t'],
            'schedule_topic' => $item['gsx$演講主題']['$t'],
            'schedule_info' => $item['gsx$演講摘要']['$t'],
            'slide' => $item['gsx$slide']['$t'],
        ];

        $lang_en[$item['gsx$講者編號']['$t']] = [
            'name'     => $item['gsx$姓名']['$t'],
            'type'     => $item['gsx$類別']['$t'],
            'job'      => $item['gsx$職稱']['$t'],
            'info'     => $item['gsx$個人介紹en']['$t'],
            'picture'  => $item['gsx$照片']['$t'],
            'facebook' => $item['gsx$facebook']['$t'],
            'github'   => $item['gsx$github']['$t'],
            'blog'     => $item['gsx$blog']['$t'],
            'website'  => $item['gsx$website']['$t'],
            'linkedin' => $item['gsx$linkedin']['$t'],
            'schedule_topic' => $item['gsx$演講主題en']['$t'],
            'schedule_info' => $item['gsx$演講摘要en']['$t'],
            'slide' => $item['gsx$slide']['$t'],
        ];
    }

    $main = [
        'zh' => $lang_zh[$speaker],
        'en' => $lang_en[$speaker],
    ];

    return getI18n($main);
}
