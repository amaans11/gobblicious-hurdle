<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function __construct(Request $request)
    {
        if (! $request->api_key || $request->api_key !== env('EXPORT_API_KEY')) {
            abort(403, 'api_key needed');
        }
    }

    public function users()
    {
        return Excel::download(new UsersExport, $this->getFileName('users'));
    }

    protected function getFileName($type = 'users')
    {
        $name = implode('_', [
            env('APP_NAME'),
            Carbon::now()->toDateTimeString(),
            $type,
        ]);

        return $name.'.xlsx';
    }
}
