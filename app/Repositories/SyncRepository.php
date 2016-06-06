<?php 
namespace App\Repositories;

abstract class SyncRepository {

	
	/**
	 * The Model instance.
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
	protected $model;


	public function sync($relationship, $column, array $values)
    {
        $new_values = array_filter($values);
        $old_values = $this->$relationship->lists($column, 'id');

        // Delete removed values, if any
        if ($deleted = Arrays::keysDeleted($new_values, $old_values)) {
            $this->$relationship()->whereIn('id', $deleted)->delete();
        }

        // Create new values, if any
        if ($created = Arrays::keysCreated($new_values, $old_values)) {
            foreach ($created as $id) {
                $new[] = $this->$relationship()->getModel()->newInstance([
                    $column => $new_values[$id],
                ]);
            }

            $this->$relationship()->saveMany($new);
        }

        // Update changed values, if any
        if ($updated = Arrays::keysUpdated($new_values, $old_values)) {
            foreach ($updated as $id) {
                $this->$relationship()->find($id)->update([
                    $column => $new_values[$id],
                ]);
            }
        }
    }
}