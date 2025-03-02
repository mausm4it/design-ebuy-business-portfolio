<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $language = getLanguage();
        $categories = PortfolioCategory::all();

        return view('admin.portfolio.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'category_name' => 'required|unique:portfolio_categories|max:255',
             'category_image' => 'required',
            'status'   =>  'integer|in:0,1',
            'order'   =>  'required|integer',
        ]);

        // Get All Request
        $input = $request->all();
        
     if($request->hasFile('category_image')){

            // Get image file
            $category_image_file = $request->file('category_image');

            // Folder path
            $folder = 'uploads/img/porfoliocategory/';

            // Make image name
            $category_image_name = time().'-'.$category_image_file->getClientOriginalName();

            // Original size upload file
            $category_image_file->move($folder, $category_image_name);

            // Set input
            $input['category_image']= $category_image_name;

        } else {
            // Set input
            $input['category_image']= null;
        }
        // Record to database
        PortfolioCategory::create([
            'language_id' => getLanguage()->id,
            'category_name' => $input['category_name'],
            'category_image' => $input['category_image'],
            'status' => $input['status'],
            'order' => $input['order']
        ]);

        return redirect()->route('portfolio-category.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving models
        $category = PortfolioCategory::findOrFail($id);

        return view('admin.portfolio.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'category_name'   =>  [
                'required',
                'max:255',
                Rule::unique('portfolio_categories')->ignore($id),
            ],
            'status'   =>  'integer|in:0,1',
            'order'   =>  'required|integer',
              'category_image' => 'required',
        ]);

        // Get All Request
        $input = $request->all();
        
         if($request->hasFile('category_image')){

            // Get image file
            $category_image_file = $request->file('category_image');

            // Folder path
            $folder = 'uploads/img/porfoliocategory/';

            // Make image name
            $category_image_name = time().'-'.$category_image_file->getClientOriginalName();

            // Original size upload file
            $category_image_file->move($folder, $category_image_name);

            // Set input
            $input['category_image']= $category_image_name;

        } else {
            // Set input
            $input['category_image']= null;
        }
        

        // Update to database
        PortfolioCategory::find($id)->update($input);

        return redirect()->route('portfolio-category.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieving a model
        $category = PortfolioCategory::find($id);

        // Delete model
        $category->delete();

        return redirect()->route('portfolio-category.create')
            ->with('success', 'content.deleted_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_checked(Request $request)
    {
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('portfolio-category.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieving a model
            $category = PortfolioCategory::find($id);

            // Delete model
            $category->delete();

        }

        return redirect()->route('portfolio-category.create')
            ->with('success', 'content.deleted_successfully');
    }
}
