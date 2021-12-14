<?php

use yii\db\Migration;

/**
 * Class m211212_165121_init_database
 */
class m211212_165121_init_database extends Migration {

    /**
     * {@inheritdoc}
     */
    public function up() {
        $this->createTable('{{%measurements}}', [
            'ID' => $this->primaryKey(),
            'gender_ID' => $this->integer(30),
            'waist' => $this->string(30)->notNull(),
            'body_weight' => $this->string(30)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->Null()
                ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function down() {
        Yii::$app->db->createCommand()->dropTable('{{%measurements}}')->execute();

        return false;
    }

}
