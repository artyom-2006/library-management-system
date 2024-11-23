<?php

// Function normalizes armenian numbers
function normalizeAndComparePhones($inputPhone, $dbPhone) {
    $normalizedInputPhone = substr(preg_replace('/\D/', '', $inputPhone), -8);
    $normalizedDbPhone = substr(preg_replace('/\D/', '', $dbPhone), -8);

    return $normalizedInputPhone === $normalizedDbPhone;
}