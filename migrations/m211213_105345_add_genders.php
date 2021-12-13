<?php

use yii\db\Migration;

/**
 * Class m211213_105345_add_genders
 */
class m211213_105345_add_genders extends Migration {

    /**
     * {@inheritdoc}
     */
    public function up() {
        $this->createTable('{{%genders}}', [
            'ID' => $this->primaryKey(),
            'name' => $this->string(30)->notNull()
                ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addForeignKey('{{%fk_measurement_genders}}', '{{%measurement}}', 'gender_ID', '{{%genders}}', 'ID', 'CASCADE', 'RESTRICT');
        
        $this->insert('genders', [
            'ID' => '1',
            'name' => 'Mężczyzna'
        ]);
        
        $this->insert('genders', [
            'ID' => '2',
            'name' => 'Kobieta'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down() {

        Yii::$app->db->createCommand("SET foreign_key_checks = 0")->execute();
        Yii::$app->db->createCommand()->dropTable('{{%genders}}')->execute();
        Yii::$app->db->createCommand("SET foreign_key_checks = 1")->execute();

        return false;
    }

}
