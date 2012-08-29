<?php

/**
 * Returns a localized message according to user preferred language.
 * @param string message category
 * @param string message to be translated
 * @param array parameters to be applied to the translated message
 * @return string translated message
 */
function t($category, $message, $params=array())
{
    static $messages;

    if ($messages === null) {
        $messages = array();
        if(($lang=getPreferredLanguage()) !== false) {
            $file = dirname(__FILE__)."/messages/$lang/yii.php";
            if (is_file($file))
                $messages = include($file);
        }
    }

    if (empty($message)) return $message;

    if (isset($messages[$message]) && $messages[$message] !== '')
        $message = $messages[$message];

    return $params !== array() ? strtr($message, $params) : $message;
}

function renderFile($_file, $_params=array())
{
    extract($_params);
    require($_file);
}
