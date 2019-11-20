<?php

class AccessabilityService extends DbService {

    public function GetAllissues() {
        return $this->GetObjects('AccessabilityIssue',['is_deleted'=>0]);
    }
    
    // returns a single example item matching the given id
    public function GetissueForId($id) {
        return $this->GetObject('AccessabilityIssue',$id);
    }



    public function navigation(Web $w, $title = null, $nav = null) {
        if ($title) {
            $w->ctx("title", $title);
        }

        $nav = $nav ? $nav : array();

        if ($w->Auth->loggedIn()) {

            $w->menuLink("accessability-issues/index", "issues", $nav);

        }
        $w->ctx("navigation", $nav);
        return $nav;
    }

}