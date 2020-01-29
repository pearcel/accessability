<?php

function edit_GET(Web $w) {

   

    $p = $w->pathMatch('id');

    //add a title to the action
    //$w->ctx('title','Add new issue');
    $w->ctx('title', !empty($p['id']) ? 'Edit issue' : 'Add new issue');

    $issue = !empty($p['id']) ? $w->accessability->getissueForId($p['id']) : new AccessabilityIssue($w);
    // this array is the form deffinition
    $formData = [
        'Item Data' =>[                         // this is a form section title 
            [                                   // each array on this level represents a row on the form. This row has only a single input. 
                ['Name','text','name',$issue->name], // this if the input field definition. [Label, type, name, value]
            ],
            [                                   // each array on this level represents a row on the form. This row has only a single input. 
                ['Email','text','email',$issue->email], // this if the input field definition. [Label, type, name, value]
            ],
            [                                   // each array on this level represents a row on the form. This row has only a single input. 
                ['Store_Name','text','store_name',$issue->store_name],      // this if the input field definition. [Label, type, name, value] 
            ], 
            [                                   // each array on this level represents a row on the form. This row has only a single input. 
                ['Store_Location','text','store_location',$issue->store_location],      // this if the input field definition. [Label, type, name, value] 
            ], 
            [                                   // each array on this level represents a row on the form. This row has only a single input. 
                ['Other Location','text','other_location',$issue->other_location],      // this if the input field definition. [Label, type, name, value] 
            ], 
            [                                  // each array on this level represents a row on the form. This row has only a single input. 
                ['Issue','text','issue',$issue->issue],      // this if the input field definition. [Label, type, name, value] 
            ], 
        ] 
    ]; 


    if (!empty($p['id'])) {
        $postUrl = '/accessability-issues/edit/' . $issue->id;
    } else {
        $postUrl = '/accessability-issues/edit';
    }



    // sending the form to the 'out' function bypasses the template. 
   // $w->out(Html::multiColForm($formData, '/accessability_issue')); 
   $w->out(Html::multiColForm($formData, $postUrl));
}



function edit_POST(Web $w) {

    $p = $w->pathMatch('id');
    $issue = !empty($p['id']) ? $w->accessability->getissueForId($p['id']) : new AccessabilityIssue($w);
    
    //create a new example item object
    //$item = new AccessabilityIssue($w);
    
    //use the fill function to fill input field data into properties with matching names
    $issue->fill($_POST);
     
    // function for saving to database
    $issue->insertOrUpdate();
    
    // the msg (message) function redirects with a message box
    $w->msg('Item Saved', '/accessability-issues/index');
}


