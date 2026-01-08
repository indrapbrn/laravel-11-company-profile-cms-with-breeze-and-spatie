<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use Illuminate\Support\Facades\DB;
use App\Models\CompanyAbout;
use Illuminate\Http\Request;

class CompanyAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $abouts = CompanyAbout::orderByDesc('id')->paginate(10);
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request)
    {
        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            $keypoints = $validated['keypoints'];
            unset($validated['keypoints']);

            // Upload thumbnail
            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('thumbnails', 'public');

            // Simpan about
            $about = CompanyAbout::create($validated);

            // Simpan keypoints
            foreach ($keypoints as $keypoint) {
                $about->keypoints()->create([
                    'keypoint' => $keypoint,
                ]);
            }
        });

        return redirect()
            ->route('admin.abouts.index')
            ->with('success', 'About berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(CompanyAbout $companyAbout)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyAbout $about)
    {
        //
        return view('admin.abouts.edit', compact('about'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyAbout $about)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyAbout $about)
    {
        //
        DB::transaction(function() use ($about) {
            $about->delete();
        });

        return redirect()->route('admin.abouts.index');
    }
}
