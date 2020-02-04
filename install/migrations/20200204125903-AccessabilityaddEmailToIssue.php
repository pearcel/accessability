<?php

class AccessabilityaddEmailToIssue extends CmfiveMigration {

	public function up() {
		// UP
		
		$this->addColumnToTable('accessability_issue', 'email', 'string', ['default' => null, 'null' => true]);


	}

	public function down() {
		// DOWN
		$this->removeColumnFromTable('accessability_issue', 'email');
	}

	public function preText()
	{
		return null;
	}

	public function postText()
	{
		return null;
	}

	public function description()
	{
		return null;
	}
}
