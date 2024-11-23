<?php

function isAdminLoggedIn() {
    return $_SESSION["admin_logged_in"] === true;
}