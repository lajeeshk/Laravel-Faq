<?php

function __($key = null, $replace = [], $locale = null)
{
    if (is_null($key)) {
        return $key;
    }
    app('events')->dispatch(new App\Events\LocaleRendered($key));
    return trans($key, $replace, $locale);
}