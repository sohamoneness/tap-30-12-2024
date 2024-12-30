<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blogger;
use App\Models\User;
use App\Models\PitchBlogCategory;


class BloggerController extends Controller
{
   public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $data = Blogger::where('user_id', $userId)->with('categorypitch')->paginate(10);
            //dd($data);
            return view('front.blogger.index', compact('data'));
        }
    }

   public function create(){
       $data = Blogger::orderBy('id','ASC')->get();
        $sum = PitchBlogCategory::orderBy('id','ASC')->get();
       return view('front.blogger.create',compact('data','sum'));
   }
   public function store(Request $request)
{
    // Define validation rules
    $request->validate([
        'website_name' => 'required|string|max:255',
        'website_description' => 'required|string',
        'category' => 'required|string|max:255',
        'domain_authority' => 'required|string|min:0',
        'alexa_rank' => 'required|string|min:0',
        'link' => 'required|url',
        'email_address' => 'required|email',
    ]);

    // Add the authenticated user's ID to the request data
    $data = $request->all();
    $data['user_id'] = Auth::id(); // Using Auth::id() to get the authenticated user's ID

    // Store validated data in the database, including the user_id
    Blogger::create($data);

    // Redirect back with success message
    return redirect()->to('user/pitch/blogger/index')->with('success', 'Blogger information submitted successfully.');
}


    public function edit($id)
{
    // Fetch the specific Blogger record by ID
    $blogger = Blogger::findOrFail($id);

    // Get all categories for the select dropdown
    $categories = PitchBlogCategory::orderBy('id', 'ASC')->get();

    // Pass the blogger data and categories to the edit view
    return view('front.blogger.edit', compact('blogger', 'categories'));
}


   public function update(Request $request, $id)
{
    // Define validation rules
    $request->validate([
        'website_name' => 'required|string|max:255',
        'website_description' => 'required|string',
        'category' => 'required|string|max:255',
        'domain_authority' => 'required|string|min:0',
        'alexa_rank' => 'required|string|min:0',
        'link' => 'required|url',
        'email_address' => 'required|email',
    ]);

    // Find the specific Blogger record
    $blogger = Blogger::findOrFail($id);

    // Update the Blogger record with new data
    $blogger->update([
        'website_name' => $request->input('website_name'),
        'website_description' => $request->input('website_description'),
        'category' => $request->input('category'),
        'domain_authority' => $request->input('domain_authority'),
        'alexa_rank' => $request->input('alexa_rank'),
        'link' => $request->input('link'),
        'email_address' => $request->input('email_address'),
        'user_id' => Auth::id() // Ensure the current user is updated
    ]);

    // Redirect back with success message
    return redirect()->to('user/pitch/blogger/index')->with('success', 'Blogger information updated successfully.');
}

    public function detail($id)
    {
        $data = Blogger::where('id', $id)->with('categorypitch')->first();
       
        return view('front.blogger.details', compact('data'));
    }

    public function delete($id)
    {
    $blogger = Blogger::findOrFail($id);
    $blogger->delete();

    return redirect()->to('user/pitch/blogger/index')->with('success', 'Blogger deleted successfully.');
    }
   public function show()
{
    $blogger_user = User::where('type', 4)->where('status', 1)->get();
    return view('front.blogger.show', compact('blogger_user'));
}

    public function bloggerdetails($id)
{
     $bloggers = Blogger::where('user_id', $id)->with('categorypitch')->get();
    return view('front.blogger.blogger_details',compact('bloggers'));
}
public function downloadCsv($id)
{
    // Fetch bloggers data
    $bloggers = Blogger::where('id',$id)->get();
    
    // Define the headers for CSV output
    $headers = [
        'Content-type'        => 'text/csv',
        'Content-Disposition' => 'attachment; filename=bloggers.csv',
        'Pragma'              => 'no-cache',
        'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
        'Expires'             => '0',
    ];

    // Define the callback that will output the CSV content
    $callback = function() use ($bloggers) {
        $file = fopen('php://output', 'w');
        
        // Add the CSV column headings
        fputcsv($file, ['Website Name', 'Website Description', 'Category', 'Domain Authority', 'Alexa Rank', 'Link', 'Email Address']);

        // Add each blogger's data to the CSV
        foreach ($bloggers as $blogger) {
            fputcsv($file, [
                $blogger->website_name,
                $blogger->website_description,
                $blogger->category,
                $blogger->domain_authority,
                $blogger->alexa_rank,
                $blogger->link,
                $blogger->email_address,
            ]);
        }

        fclose($file);
    };

    // Return the response as a streamed output
    return response()->stream($callback, 200, $headers);
}


}
