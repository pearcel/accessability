<?php

function delete_ALL(Web $w) {

    // start by finding the issue id included in the URL
    $p = $w->pathMatch('id');
    // check to see if the id has been found
    if (empty($p['id'])) {
        // if no id found use the 'error' function to redirect the use to a safe page and display a message.
        $w->error('No id found for issue','accessability');
    }
    // use the id to retrieve the issue
    $issue = $w->accessability->getissueForId($p['id']);
    // check to see if the issue was found
    if (empty($issue)) {
        // no issue found so let the user know
        $w->error('No issue found for id','accessability');
    }
    // delete the issue
    $issue->delete();
    // redirect the user back to the issue list with a message
    $w->msg('issue deleted','accessability');
}