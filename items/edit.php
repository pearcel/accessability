<?php

function edit_GET(Web $w) {

    //add a title to the action
    $w->ctx('title','Add new item');

    // this array is the form deffinition
    $formData = [
        'Item Data' =>[                         // this is a form section title
            [                                   // each array on this level represents a row on the form. This row has only a single input.
                ['Name','text','name',''],      // this if the input field definition. [Label, type, name, value]
            ],
            [                                   // this row has 3 input fields.
                ['Checked','checkbox','is_checked',0],
                ['Date Started', 'date','dt_started',null],
                ['Number','text','my_integer',0]
            ]
        ]
    ];

    // sending the form to the 'out' function bypasses the template. 
    $w->out(Html::multiColForm($formData, 'example-item/edit')); 

}