<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if(!function_exists('uuid')){
    function uuid(){
        return Uuid::uuid1()->toString();
    }
}
if(!function_exists('encrypt')){
    function encrypt($password){
        return password_hash($password,PASSWORD_BCRYPT,['cost'=>11]);
    }
}
if(!function_exists('verify_password')){
    function verify_password($password,$hash){
        return password_verify($password,$hash);
    }
}
if(!function_exists('generate_access_token')){
    function generate_access_token($user){
        $secret = '2d57ff47-9678-4ac0-b488-0c19067cc785';
        $access_token = new stdClass();
        $access_token->user_id = $user->id;
        $access_token->role = $user->role;
        $access_token->name = $user->first_name;
        $access_token->token_id = uuid();
        $access_token->iat = date_timestamp_get(date_create());
        $payload = base64_encode(json_encode($access_token));
        $signature = hash('sha256',$secret.$payload);
        return array('signature'=>$signature,'payload'=> $payload);
    }
}
if(! function_exists('claim_access_token')){
  function claim_access_token($signature,$payload){
    $secret = '2d57ff47-9678-4ac0-b488-0c19067cc785';
    if(hash('sha256',$secret.$payload) === $signature){
      $token = json_decode(base64_decode($payload));
      return $token;
    }else {
      return null;
    }
  }
}
if(!function_exists('check_token_cookies')){
  function check_token_cookies(){
    if(!empty(get_cookie('sig')) && !empty(get_cookie('at'))){
      $decoded_token = claim_access_token(get_cookie('sig'),get_cookie('at'));
      if(!empty($decoded_token))
        return $decoded_token;
      else
        return null;
    }
    else
      return null;
  }
}