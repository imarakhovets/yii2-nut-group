<?php
/**
 * Created by PhpStorm.
 * User: marakhovets
 * Date: 04.09.2018
 * Time: 15:47
 */


namespace app\models;

use yii\db\ActiveRecord;
use yii\base\Behavior;

use yii\base\Model;

use Yii;


/**
 * Расширяет модель дополнительными полями
 *
 * @property string $callerId
 * @property string $phone

 */
class TvTextBehavior extends Behavior
{
    private $additionFields = [];

    /**
     * Получение значетия дополнительноо поля
     * осуществляет поиск значения по его имени среди связанных сущностей TvText
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if ($tvText = $this->findByName($name))
            return $tvText->content;
    }

    public function canGetProperty($name, $checkVars = true){
        return is_null($this->findByName($name)) ? false : true;
    }


    /**
     * Задание значения дополнительного поля
     * осуществляет сохранение значения в сущности TvText
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        if (is_null($tvText = $this->findByName($name))) {
            $tvText = new TvText(['model_id' => $this->owner->id, 'model' => $this->owner::className(), 'name' => $name]);
            $this->additionFields[$name] = $tvText;
        }

        $tvText->content = $value;
        $tvText->save();
    }

    public function canSetProperty($name, $checkVars = true){
        return true;
    }



    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete'
        ];
    }

    /**
     * Поиск всех сущностей TvText хронящих информацию о значении дополительных полей для текущей записи данной модели
     */
    public function afterFind()
    {
        $tvTexts = TvText::findAll(['model_id' => $this->owner->id, 'model' => $this->owner::className()]);
        foreach ($tvTexts as $tvText)
            $this->additionFields[$tvText->name] = $tvText;
    }

    /**
     * Удаление все сущностей TvText связанных с текущей записью данной модели
     */
    public function afterDelete()
    {
        TvText::deleteAll(['model_id' => $this->owner->id, 'model' => $this->owner::className()]);
    }




    private function findByName($name)
    {
        return isset($this->additionFields[$name]) ? $this->additionFields[$name] : null;
    }
}

