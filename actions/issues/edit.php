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
                ['Store Location','text','name',''],      // this if the input field definition. [Label, type, name, value]
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
    $w->out(Html::multiColForm($formData, 'example-item/edit')); 

}

function edit_POST(Web $w) {

    //create a new example item object
    $item = new ExampleItem($w);
    
    //use the fill function to fill input field data into properties with matching names
    $item->fill($_POST);
     
    // function for saving to database
    $item->insertOrUpdate();
    
    // the msg (message) function redirects with a message box
    $w->msg('Item Saved', '/example');
}

function index_GET(Web $w) {
    
    $w->ctx("title","Example Module");

    // access service functions using the Web $w object and the module name
    $exampleItems = $w->Example->getAllItems();

    // build the table array adding the headers and the row data
    $table = [];
    $tableHeaders = ['Name','Store Name','Store Location','Other Location','Issue'];
    foreach ($exampleItems as $item) {
        $row = [];
        // add values to the row in the same order as the table headers
        $row[] = $item->name;
        $row[] = $item->store_name;
        $row[] = $item->store_location;
        $row[] = $item->other_location;
        $row[] = $item->issue;
        $actions[] = Html::b('/example-item/edit/' . $item->id,'Edit Item');
        $actions[] = Html::b('/example-item/delete/' . $item->id, 'Delete', 'Are you sure you want to delete this item?');
        $row[] = implode('',$actions);
        $table[] = $row;
    }

    //send the table to the template using ctx
    $w->ctx('itemTable', Html::table($table,'item_table','tablesorter',$tableHeaders));
}