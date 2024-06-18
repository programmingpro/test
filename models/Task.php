<?php

declare(strict_types = 1);

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Task
 *
 * This class represents a task entity in the application.
 *
 * @property int $id The unique identifier for the task.
 * @property string $title The title of the task.
 * @property string $description The detailed description of the task.
 * @property string $due_date The due date for the task in the format Y-m-d.
 * @property string $status The status of the task, limited to 20 characters.
 * @property int $priority The priority level of the task.
 */
class Task extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'task';
    }

    public function rules(): array
    {
        return [
            [['title', 'description', 'due_date', 'status', 'priority'], 'required'],
            [['id'], 'integer'],
            [['id'], 'default', 'value' => null],
            [['id'], 'customValidationForId'],
            [['description'], 'string'],
            [['due_date'], 'date', 'format' => 'php:Y-m-d'],
            [['status'], 'string', 'max' => 20],
            [['priority'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'due_date' => 'Due Date',
            'status' => 'Status',
            'priority' => 'Priority',
        ];
    }

    public function beforeSave($insert): bool
    {
        if ($this->isNewRecord) {
            $this->id = null;
        }
        return true;
    }
    public function customValidationForId($attribute): void
    {
        if (!$this->isNewRecord && $this->isAttributeChanged($attribute)) {
            $this->addError($attribute, 'ID cannot be changed once set.');
        }
    }
}