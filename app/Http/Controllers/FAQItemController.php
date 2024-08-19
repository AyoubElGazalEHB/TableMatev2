<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq_Items;
use App\Models\Faq_categories;
use Illuminate\Support\Facades\Auth;




class FAQItemController extends Controller
{
    
/*User Panel */
 public function display()
    {
$categories = Faq_categories::with('faqItems')->get();

        return view('user.faq', compact('categories'));
    }

/*Admin Panel */

 public function faqItem_managment()
    {
        $data=Faq_Items::all();

   $data->each(function ($item) {
            $category = Faq_categories::find($item->faq_categories_id);
            $item->categoryTitle = $category ? $category->title : null;
        });

        if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.faqItem.faq_item', compact('data'));
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


public function add_it()
{

$categories = Faq_categories::all();

$data = new Faq_Items;
if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.faqItem.add_item', compact('categories', 'data'));
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


    public function add_item(Request $request)
        {

        $item = new Faq_Items;

        $item->faq_categories_id=$request->category_id;
        $item->question=$request->question;
        $item->answer=$request->answer;

        $item->save();

        return redirect()->back()->with('message',"'The questions has been added");
        }

        public function delete_item($id)
        {
            $data=Faq_Items::find($id);

                $data->delete();


            return redirect()->back()->with('message', "The category $data->question has been deleted");
        }


    public function edititem($id)
    {

        $data=Faq_Items::find($id);


$categories = Faq_categories::all();


        if(Auth::id())
                {
                    if(Auth::user()->typeUser=='1')
                    {
                        return view('admin.faqItem.edit_item',compact('data','categories'));
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

    public function changing_item(Request $request,$id)
    {

        $item=Faq_Items::find($id);
    
        $item->faq_categories_id=$request->faq_categories_id;
        $item->question=$request->question;
        $item->answer=$request->answer;

        $item->save();

        return redirect()->back()->with('message', "The table title $item->question has been Updated");

    }


}
