<?php

namespace Misadjalovic\Coder;


use Exception;
use RangeException;

class Coder
{

    /**
     * Generates coded string.
     *
     * @param int $length
     * @param int $strenght
     * @return string
     *
     * @throws Exception
     */
    public function generate(int $strenght, int $length): string
    {
        $pools = [
            1 => ['l', 'u', 'u'],
            2 => ['l', 'u', 'u', 'd'],
            3 => ['l', 'u', 'u', 'd', 's'],
        ];

       if ($length < 6) {
           throw new RangeException('Unable to generate: Lenght cannot be less than 6.');
       }

        if (!isset($pools[$strenght])) {
            throw new RangeException('Unable to generate: Strenght can range from 1 to 3.');
        }

        return $this->generateStrongPassword($length, $pools[$strenght]);
    }

    /**
     * @throws Exception
     */
    private function generateStrongPassword($length, $codeSets): string
    {
        $all = '';
        $password = '';
        $sets = array();

        foreach ($codeSets as $letter) {
            $sets[] = match ($letter) {
                'l' => 'abcdefghjkmnpqrstuvwxyz',
                'u' => 'ABCDEFGHJKMNPQRSTUVWXYZ',
                'd' => '2345',
                's' => '!#$%&(){}[]=',
            };
        }

        foreach($sets as $set)
        {
            $value = random_int(0, count(str_split($set)) - 1);
            $password .= $set[$value];
            $all .= $set;
        }

        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++) {
            $value = random_int(0, count($all) - 1);
            $password .= $all[$value];
        }

        return str_shuffle($password);
    }
}
