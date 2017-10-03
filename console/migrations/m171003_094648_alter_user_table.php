<?php

use yii\db\Migration;

/**
 * Class m171003_094648_alter_user_table
 */
class m171003_094648_alter_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
	    $this->renameColumn('{{%user}}', 'username', 'login');

	    $this->addColumn('{{%user}}', 'username', $this->string()->after('login'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171003_094648_alter_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171003_094648_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
