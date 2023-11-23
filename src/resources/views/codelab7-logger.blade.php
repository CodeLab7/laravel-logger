{!! "<?php" !!}

namespace App\Observers;

use App\Models\{{$modelName}};
use Codelab7\LaravelLogger\Models\Cl7Logger;

class {{$modelName}}Observer {

    public $afterCommit = TRUE;

    /**
     * Handle the {{$modelName}} "created" event.
     */
    public function created({{$modelName}} ${{strtolower($modelName)}}): void {
        Cl7Logger::create([
            "token"   => "create",
            "reff_id" => ${{strtolower($modelName)}}->id,
            "entity"  => "App\Models\{{$modelName}}",
            "user_id" => auth()->user()->id,
            "data"    => json_encode(["new" => ${{strtolower($modelName)}}])
        ]);
    }

    /**
     * Handle the {{$modelName}} "updated" event.
     */
    public function updated({{$modelName}} ${{strtolower($modelName)}}): void {
        $newData = array_diff(${{strtolower($modelName)}}->toArray(), ${{strtolower($modelName)}}->getOriginal());
        unset($newData['created_at'], $newData['updated_at']);

        $oldData = [];
        $originalData = ${{strtolower($modelName)}}->getOriginal();
        foreach ($newData as $key => $data) {
            $oldData[$key] = $originalData[$key];
        }

        Cl7Logger::create([
            "token"   => "update",
            "reff_id" => ${{strtolower($modelName)}}->id,
            "entity"  => "App\Models\{{$modelName}}",
            "user_id" => auth()->user()->id,
            "data"    => json_encode(["new" => $newData, "old" => $oldData])
        ]);
    }

    /**
     * Handle the {{$modelName}} "deleted" event.
     */
    public function deleted({{$modelName}} ${{strtolower($modelName)}}): void {
        Cl7Logger::create([
            "token"   => "delete",
            "reff_id" => ${{strtolower($modelName)}}->id,
            "entity"  => "App\Models\{{$modelName}}",
            "user_id" => auth()->user()->id,
            "data"    => json_encode(["old" => ${{strtolower($modelName)}}])
        ]);
    }

    /**
     * Handle the {{$modelName}} "restored" event.
     */
    public function restored({{$modelName}} ${{strtolower($modelName)}}): void {
        Cl7Logger::create([
            "token"   => "restore",
            "reff_id" => ${{strtolower($modelName)}}->id,
            "entity"  => "App\Models\{{$modelName}}",
            "user_id" => auth()->user()->id,
            "data"    => json_encode(["old" => ${{strtolower($modelName)}}])
        ]);
    }

    /**
     * Handle the {{$modelName}} "force deleted" event.
     */
    public function forceDeleted({{$modelName}} ${{strtolower($modelName)}}): void {
        Cl7Logger::create([
            "token"   => "force_delete",
            "reff_id" => ${{strtolower($modelName)}}->id,
            "entity"  => "App\Models\{{$modelName}}",
            "user_id" => auth()->user()->id,
            "data"    => json_encode(["old" => ${{strtolower($modelName)}}])
        ]);
    }

}
