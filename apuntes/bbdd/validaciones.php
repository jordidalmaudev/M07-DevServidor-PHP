<?php

function isMail($email)
{
    $regex = "/^[a-zA-Z0-9]+@[a-zA-Z]+.[a-zA-Z]{2,}$/";
    return preg_match($regex, $email) === 1;
}
