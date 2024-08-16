<?php

use App\Utility\SettingsUtility;

//return file path with public
if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        return app('url')->asset('public/' . $path, $secure);
    }
}

//Get Settings
if (!function_exists('get_setting')) {
    function get_setting($key, $default = "")
    {
        $setting =  SettingsUtility::get_settings_value($key) ;
        return $setting == "" ? $default : $setting;
    }
}

//overWriteENVFile
if (!function_exists('overWriteEnvFile'))
{
    function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
            }
        }
    }
}

?>
