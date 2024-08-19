<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq_categories;
use Illuminate\Support\Facades\Auth;



class FAQCategoryController extends Controller
{

/*User Panel */
public function index()
    {
        $categories = Faq_categories::all();

        return view('admin.categories.index', compact('categories'));
    }


/*Admin Panel */


 public function faq_managment()
    {
        $data=Faq_categories::all();

        if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.faqCat.faq_cat', compact('data'));
                    } else
                    {
                    return redirect()->back();
                    }
                }
                else
                {
                return redirect('login');
                }



    }


public function add_cat()
{
if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.faqCat.add_cat');
                    } else
                    {
                    return redirect()->back();
                    }
                }
                else
                {
                return redirect('login');
                }

}


    public function add_category(Request $request)
        {
        $category = new Faq_categories;

        $category->title=$request->title;

        $category->save();

        return redirect()->back()->with('message',"'The category $category->title has been added");
        }

        public function delete_category($id)
        {
            $data=Faq_categories::find($id);

                $data->delete();


            return redirect()->back()->with('message', "The category $data->title has been deleted");
        }


    public function editcategory($id)
    {

        $data=Faq_categories::find($id);


        if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.faqCat.edit_cat',compact('data'));
                    } else
                    {
                    return redirect()->back();
                    }
                }
                else
                {
                return redirect('login');
                }

    }

    public function changing_category(Request $request,$id)
    {

        $category=Faq_categories::find($id);
    
        $category->title=$request->title;

        $category->save();

        return redirect()->back()->with('message', "The table title $category->title has been Updated");

    }


}
