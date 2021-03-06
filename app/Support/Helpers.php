<?php

/**
 * @param string|null $param
 * @return string
 */
function site(string $param = null): string
{
    if ($param && !empty(SITE[$param])) {
        return SITE[$param];
    }

    return SITE["root"];
}

/**
 * @param string $path
 * @return string
 */
function asset(string $path): string
{
    return SITE["root"]."/{$path}";
}

function flash(string $type = null, string $message = null): ?string
{
    if ($type && $message) {
        $_SESSION["flash"] = [
            "type" => $type,
            "message" => $message
        ];

        return null;
    }

    if (!empty($_SESSION["flash"]) && $flash = $_SESSION["flash"]) {
        unset($_SESSION["flash"]);
        return "<div class=\"message {$flash["type"]}\">
                    {$flash["message"]}
                </div>";
    }

    return null;
}

function setOld(string $field, string $value): string
{
    return $_SESSION['old'][$field] = $value;
}

function old(string $field, string $defaultValue = null): ?string
{
    if (
        !empty($_SESSION['old'][$field])
        && $fieldValue = $_SESSION['old'][$field]
    ) {
        unset($_SESSION['old'][$field]);
        return $fieldValue;
    }

    return $defaultValue;
}