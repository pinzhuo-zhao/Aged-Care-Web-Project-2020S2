<?php
/**
 * Created by PhpStorm.
 * User: charlespinzhuozhao
 * Date: 5/9/18
 * Time: 11:57 PM
 */
namespace App\Model\Entity;
class Role
{

    const CUSTOMER = "customer";
    const ADMIN = "admin";


    public static function isAdmin($roleId) {
        return $roleId == Role::ADMIN;
    }
    public static function isCustomer($roleId) {
        return $roleId == Role::CUSTOMER;
    }

}
