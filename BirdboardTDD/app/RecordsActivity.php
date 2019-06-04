<?php

namespace App;

trait RecordsActivity
{
    /**
     * The project's old attributes.
     *
     * @var array
     */
     public $old = [];

     /**
     * Boot the trait.
     */
     public static function bootRecordsActivity()
     {
         static::updating(function ($model) {
             $model->old = $model->getOriginal();
         });
     }

    /**
    * Record activity for a project.
    *
    * @param string $type
    */
    public function recordActivity($description)
    {
        $this->activity()->create([
            'description' => $description,
            'changes' => $this->activityChanges(),
            'project_id' => class_basename($this) === 'Project' ? $this->id : $this->project_id
        ]);
    }

    /**
    * The activity feed for the task.
    *
    * @return \Illuminate\Database\Eloquent\Relations\MorphMany
    */
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
    * Fetch the changes to the model.
    *
    * @param  string $description
    * @return array|null
    */
    protected function activityChanges()
    {
        if ($this->wasChanged()) {
            return [
                'before' => array_except(array_diff($this->old, $this->getAttributes()), 'updated_at'),
                'after' => array_except($this->getChanges(), 'updated_at')
            ];
        }
    }
}
