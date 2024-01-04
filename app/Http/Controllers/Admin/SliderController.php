<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Web\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\DataTables\SliderDataTable;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreSliderRequest;

class SliderController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable) 
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request) : RedirectResponse
    {

        $data = $request->validated();

        //Upload the image and get file path
        $imagePath = $this->uploadImage($request, 'image', '/web/images');

        $data['image'] = $imagePath;

        Slider::create($data);

        toastr()->success("Updated successfully");
            
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $slider = Slider::findOrfail($id);
            
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, string $id) : RedirectResponse
    {
        $data = $request->validated();

        $slider = Slider::findOrfail($id);

        //Upload the image and get file path
        $imagePath = $this->uploadImage($request, 'image', '/web/images');

        $data['image'] = isset($imagePath) ? $imagePath : $slider->image;

        $slider->update($data);
        
        toastr()->success("Updated successfully");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $slider = Slider::findOrfail($id);
            $slider->delete();

            return response()->json(['status' => 'success', 'message' => 'Deleted successfully']);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }
}
