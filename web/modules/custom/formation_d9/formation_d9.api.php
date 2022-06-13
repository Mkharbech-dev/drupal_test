<?php

/**
 * @file
 * Hooks specific to the formation_d8 module.
 */

/**
 * @addtogroup hooks
 * @{
 */

/**
 * Adds messages to page.
 *
 * @return string
 *                Returns string messages
 */
function hook_formation_messages()
{
    return 'First message';
}

/**
 * Alter messages being added to page.
 *
 * @param array $messages
 *                        Array with messages
 */
function hook_formation_messages_alter(array &$messages)
{
    $messages[0] = 'Replaced!';
}

/*
 * @} End of "addtogroup hooks".
 */
