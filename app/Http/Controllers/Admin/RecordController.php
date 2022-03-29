<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequestRoom;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function delete($id)
    {
        $record = Record::where('IDNP', $id)->firstOrFail()->delete();
        return redirect(route('admincazare', ['success' => true]));
    }
    public function store(StorePostRequestRoom $request)
    {

        $validated = $request->validated();

        $record = Record::create([
            'IDNP' => $request->IDNP,
            'roomNumber' => $request->roomNumber,
        ]);
        return redirect('admin/cazare');
    }
}
