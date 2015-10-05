<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const DELIMITER = '|';
    /**
     * Get the setting value and parsing it to the correct type before using it.
     *
     * @param string $value
     * @return mixed $value
     */
    public function getValueAttribute($value)
    {
        $parsed_value = explode(self::DELIMITER, $value, 2);
        if (count($parsed_value) < 2)
            return $value;
        if ($parsed_value[0] == 'string')
            return $parsed_value[1];
        else if ($parsed_value[0] == 'boolean')
            return ($parsed_value[1] == 'true' || $parsed_value[1] == '1') ? true : false;
        else if ($parsed_value[0] == 'integer')
            return intval($parsed_value[1]);
        return $parsed_value[1];
    }

    /**
     * Set the setting value and parsing it to the correct type before saving it.
     *
     * @param mixed $value
     */
    public function setValueAttribute($value)
    {
        $type = gettype($value);
        if ($type == 'boolean')
            $value = ($value) ? 'true' : 'false';
        $this->attributes['value'] = $type.self::DELIMITER.$value;
    }
}
