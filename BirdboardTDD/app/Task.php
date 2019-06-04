<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['project'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'completed' => 'boolean'
    ];

    /**
     * Mark the task as complete.
     */
     public function complete()
     {
         $this->update(['completed' => true]);

         $this->recordActivity('completed_task');
     }

     /**
     * Mark the task as incomplete.
     */
    public function incomplete()
    {
        $this->update(['completed' => false]);

        $this->recordActivity('incompleted_task');
    }

    /**
     * Get the owning project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the path to the task.
     *
     * @return string
     */
    public function path()
    {
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }

    /**
     * Record activity for a task.
     *
     * @param string $description
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
         return null;
         if ($this->wasChanged()) {
             return [
                 'before' => array_except(array_diff($this->old, $this->getAttributes()), 'updated_at'),
                 'after' => array_except($this->getChanges(), 'updated_at')
             ];
         }
     }
}
