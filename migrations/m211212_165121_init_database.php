<?php

use yii\db\Migration;

/**
 * Class m211212_165121_init_database
 */
class m211212_165121_init_database extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->createTable('{{%measurement}}', [
            'ID'                   => $this->primaryKey(),
            'gender'               => $this->string(30)->notNull(),
            'waist'                => $this->string(30)->notNull(),
            'body_weight'          => $this->string(30)->notNull(),
            'created_at'           => $this->integer()->notNull(),
            'updated_at'           => $this->integer()->notNull(),
            'deleted_at'           => $this->integer()->notNull(),
            'last_login_at'        => $this->integer()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand()->dropTable('{{%measurement}}')->execute();
        
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211212_165121_init_database cannot be reverted.\n";

        return false;
    }
    */
}
