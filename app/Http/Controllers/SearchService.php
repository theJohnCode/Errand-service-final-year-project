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
        // $service = Service::where('slug', $service_slug)->first();
        // If service found, redirect to its details page, else, redirect back to search page with error message.

        // return redirect()->route('service.details', ['service_slug' => $service_slug]);
        // $service = Service::where('name', 'LIKE', '%' . $request->search . '%')->first();
        // if ($service) {
        //     return redirect()->route('home.service_details', ['service_slug' => $service->slug]);
        // } else {
        //     return back()->with('error', 'No service found with the given name.');
        // }  
                                                                              
        if ($service_slug) {
            return redirect('/service/' . $service_slug);
        } else {
            return back();
        }
    }
}
