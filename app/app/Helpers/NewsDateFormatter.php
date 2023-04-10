<?php

namespace App\Helpers;

class NewsDateFormatter
{
    private \DateTime $datetime;

    public function __construct(
        string $datetime
    ) {
        $this->datetime = new \DateTime($datetime);
    }


    public function format(): string {
        $year = (integer)$this->datetime->format('Y');
        $month = $this->datetime->format('m');
        $day = (integer)$this->datetime->format('d');

        return sprintf(
            '%d %s %d',
            $day,
            $this->monthLabel($month),
            $year
        );
    }

    private function monthLabel(int $month): string {
        $config = [
            'en' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'ru' => ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'],
        ];

        $lang = app()->getLocale();
        $month -= 1;
        return \Arr::get($config, "{$lang}.{$month}");
    }



}
