<?php

/**
 * @param $key
 * @param string $filename
 */
function addTranslations($key, $filename='app'){
    $locales = config('app.locales');

    foreach ($locales as $locale){
        $all = \Lang::get($filename,[],$locale);
        if(!is_array($all)){
            $all=[];
        }
        if(!isset($all[$key])){
            $all[$key] = $key;
        }

        $langdata = "<?php\n\nreturn [\n";
        foreach ($all as $key => $value) {
            $langdata .= "    '$key' => '" . htmlspecialchars(trim($value), ENT_QUOTES) . "',\n";
        }
        $langdata .= '];';
        \File::put(resource_path('lang/'.$locale.'/'.$filename.'.php'), $langdata);
    }

}


/**
 * @param $text
 * @param string $filename
 */
function l($text, $filename='app'){
    if(!\Lang::has($filename.'.'.$text)){
        addTranslations($text, $filename);
    }

    return \Lang::get($filename.'.'.$text);
}

