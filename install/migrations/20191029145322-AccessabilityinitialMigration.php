<?php

class AccessabilityinitialMigration extends CmfiveMigration {

	public function up() {
		// UP
		$column = parent::Column();
		$column->setName('id')
				->setType('biginteger')
				->setIdentity(true);

	}

	public function down() {
		// DOWN
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