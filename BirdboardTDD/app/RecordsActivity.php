<?php

namespace App;

trait RecordsActivity
{
    /**
     * The project's old attributes.
     *
     * @var array
     */
     public $oldAttributes = [];

     /**
     * Boot the trait.
     */
     public static function bootRecordsActivity()
     {
         foreach (self::recordableEvents() as $event) {
             static::$event(function ($model) use ($event) {
                 $model->recordActivity($model->activityDescription($event));
             });

             if ($event === 'updated') {
                 static::updating(function ($model) {
                     $model->oldAttributes = $model->getOriginal();
                 });
             }
         }
     }

     protected function activityDescription($description)
     {
         return "{$description}_" . strtolower(class_basename($this));
     }

     protected static function recordableEvents()
     {
         if (isset(static::$recordableEvents)) {
             return static::$recordableEvents;
         }

          return ['created', 'updated'];
     }

    /**
    * Record activity for a project.
    *
    * @param string $type
    */
    public function recordActivity($description)
    {
        $this->activity()->create([
            'user_id' => ($this->project ?? $this)->owner->id,
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
                'before' => array_except(array_diff($this->oldAttributes, $this->getAttributes()), 'updated_at'),
                'after' => array_except($this->getChanges(), 'updated_at')
            ];
        }
    }
}
