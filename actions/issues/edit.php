<?php

function edit_GET(Web $w) {

    //add a title to the action
    $w->ctx('title','Add new issue');

    // this array is the form deffinition
    $formData = [
        'Item Data' =>[                         // this is a form section title
            [                                   // each array on this level represents a row on the form. This row has only a single input.
                ['Name','text','name',''],      // this if the input field definition. [Label, type, name, value]
            ],
            [                                   // each array on this level represents a row on the form. This row has only a single input.
                ['Store Name','text','store_name',''],      // this if the input field definition. [Label, type, name, value]
            ],
            [                                   // each array on this level represents a row on the form. This row has only a single input.
                ['Store Location','text','store_location',''],      // this if the input field definition. [Label, type, name, value]
            ],
            [                                   // each array on this level represents a row on the form. This row has only a single input.
                ['Other Location','text','other_location',''],      // this if the input field definition. [Label, type, name, value]
            ],
            [                                   // each array on this level represents a row on the form. This row has only a single input.
                ['Issue','text','issue',''],      // this if the input field definition. [Label, type, name, value]
            ],
        ]
    ];

    // sending the form to the 'out' function bypasses the template. 
    $w->out(Html::multiColForm($formData, '/accessability-issues/edit')); 

}

function edit_POST(Web $w) {

    //create a new example item object
    $item = new AccessabilityIssue($w);
    
    //use the fill function to fill input field data into properties with matching names
    $item->fill($_POST);
     
    // function for saving to database
    $item->insertOrUpdate();
    
    // the msg (message) function redirects with a message box
    $w->msg('Item Saved', '/accessability-issues/index');
}


