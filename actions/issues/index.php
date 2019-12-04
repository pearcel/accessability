<?php

function index_ALL(Web $w) {
    $w->ctx("title", "Issue Handling");



    // access service functions using the Web $w object and the module name
    $exampleItems = $w->Accessability->getAllissues();

    // build the table array adding the headers and the row data
    $table = [];
    $tableHeaders = ['Name','Store Name','Store Location','Other Location','Issue'];
    if (!empty($exampleItems)) {
        foreach ($exampleItems as $item) {
            $row = [];
            // add values to the row in the same order as the table headers
            $row[] = $item->name;
            $row[] = $item->store_name;
            $row[] = $item->store_location;
            $row[] = $item->other_location;
            $row[] = $item->issue;
            // the actions column is used to hold buttons that link to actions per item. Note the item id is added to the href on these buttons.
            $actions = [];
            $actions[] = Html::b('/accessability-issues/edit/' . $item->id,'Edit Item');
            $actions[] = Html::b('/accessability-issues/delete/' . $item->id, 'Delete', 'Are you sure you want to delete this item?');
            $row[] = implode('',$actions);
            $table[] = $row;
        }
    }

    //send the table to the template using ctx
    $w->ctx('itemTable', Html::table($table,'item_table','tablesorter',$tableHeaders));
}
    