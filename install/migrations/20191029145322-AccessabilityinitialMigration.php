<?php

class AccessabilityinitialMigration extends CmfiveMigration {

	public function up() {
		// UP
		$column = parent::Column();
		$column->setName('id')
				->setType('biginteger')
				->setIdentity(true);

				

				if (!$this->hasTable("accessability_issue")) { //it can be helpful to check that the table name is not used
					$this->table("accessability_issue", [ // table names should be appended with 'ModuleName_'
						"id" => false,
						"primary_key" => "id"
					])->addColumn($column) // add the id column
					->addStringColumn('name')
					->addStringColumn('store_name')
					->addIntegerColumn('assitance_type_id')
					
					->addStringColumn('store_location')
					
					->addStringColumn('other_location')
					
					->addStringColumn('issue')
					
					->addCmfiveParameters() // this function adds some standard columns used in cmfive. dt_created, dt_modified, creator_id, modifier_id, and is_deleted.
					
					->create();
				}

				if (!$this->hasTable("customer_input")) { //it can be helpful to check that the table name is not used
					$this->table("customer_input", [ // table names should be appended with 'ModuleName_'
						"id" => false,
						"primary_key" => "id"
					])->addColumn($column) // add the id column
					->addStringColumn('name')
					->addStringColumn('store_name')
					
					->addCmfiveParameters() // this function adds some standard columns used in cmfive. dt_created, dt_modified, creator_id, modifier_id, and is_deleted.
					
					->create();
				}

				if (!$this->hasTable("store_reply")) { //it can be helpful to check that the table name is not used
					$this->table("store_reply", [ // table names should be appended with 'ModuleName_'
						"id" => false,
						"primary_key" => "id"
					])->addColumn($column) // add the id column
					->addStringColumn('name')
					->addStringColumn('store_name')
					->addStringColumn('comments')

					->addCmfiveParameters() // this function adds some standard columns used in cmfive. dt_created, dt_modified, creator_id, modifier_id, and is_deleted.
					
					->create();
				}
			

	}

	public function down() {
		// DOWN
		$this->hasTable('accessability_issue') ? $this->dropTable('accessability_issue') : null;
		$this->hasTable('customer_input') ? $this->dropTable('customer_input') : null;
		$this->hasTable('store_reply') ? $this->dropTable('accessability_issue') : null;

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
