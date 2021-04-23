<?php
/**
 * Created by PhpStorm.
 * User: sugarfixx
 * Date: 23/04/2021
 * Time: 11:41
 */

namespace JwtTamperer;


class JwtTamperer
{
    private $jwt;

    public function __construct($jwt = null)
    {
        if ($jwt) {
            $this->setJwt($jwt);
        }
    }

    
    public function buildCompromisedToken()
    {
        $fragments = explode('.', $this->jwt);
        $validPayload = json_decode(base64_decode($fragments[1]));
        $validPayload->user->role = 'admin';
        $modifiedPayload = $this->base64UrlEncode(json_encode($validPayload));
        return $fragments[0]. '.' . $modifiedPayload . '.' . $fragments[2];
    }

    /**
     * @return string
     */
    public function getJwt() : string
    {
        return $this->jwt;
    }

    /**
     * @param string $jwt
     * @return JwtTamperer
     */
    public function setJwt($jwt) : string
    {
        $this->jwt = $jwt;
        return $this;
    }

    /**
     * @param $text
     * @return string
     */
    private function base64UrlEncode($text) : string
    {
        return str_replace(
            ['+', '/', '='],
            ['-', '_', ''],
            base64_encode($text)
        );
    }


}
