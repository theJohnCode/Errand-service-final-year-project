<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchService extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Service::select('name')->where('name', 'LIKE', '%' . $request->input('search') . '%')->get();
        return response()->json($data);
    }

    public function search(Request $request)
    {
        $service_slug = Str::slug($request->search, '-');
        if ($service_slug) {
            return redirect('/service/' . $service_slug);
        } else {
            return back();
        }
    }
}
