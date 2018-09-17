<?php

namespace app\models;

use Yii;

class Email
{
    /**
     * Send mail to the user
     *
     * @param   string  $email      The email
     * @param   string  $template   The name of template for the letter
     * @param   array   $variables  The array of the parameters
     * @param   string  $subject    The subject of the letter
     * @param   string  $textBody   The text body of the letter
     * @param   string  $htmlBody   The html body of the letter
     *
     * @return  void
     */
    public static function send($email, $template, $variables, $subject, $textBody, $htmlBody)
    {
        /*
        Yii::$app->mailer->compose($template, $variables)
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo($email)
            ->setSubject($subject)
            ->setTextBody($textBody)
            ->setHtmlBody($htmlBody)
            ->send();
        */
    }
}