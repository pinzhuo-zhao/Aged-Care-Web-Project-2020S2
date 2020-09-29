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
    const STUDENT = "student";
    const CUSTOMER = "customer";
    const ADMIN = "admin";
    const UNVERIFIED = "unverified";

    public static function isAdmin($roleId) {
        return $roleId == Role::ADMIN;
    }
    public static function isCustomer($roleId) {
        return $roleId == Role::CUSTOMER;
    }
    public static function isStudent($roleId) {
        return $roleId == Role::STUDENT;
    }
    public static function isUnverified($roleId) {
        return $roleId == Role::UNVERIFIED;
    }
}
