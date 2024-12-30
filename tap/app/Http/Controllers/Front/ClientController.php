<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Contracts\ClientContract;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientGroup;
use App\Http\Controllers\BaseController;
use App\Models\Currency;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator;

class ClientController extends BaseController
{
    /**
     * @var ClientContract
     */
    protected $ClientRepository;


    /**
     * ClientController constructor.
     * @param ClientContract $clientRepository
     */
    public function __construct(ClientContract $ClientRepository)
    {
        $this->ClientRepository = $ClientRepository;
    }
    public function index(Request $request)
    {
        $this->setPageTitle('Client', ' Client');
        $user_id = auth()->guard('web')->user()->id;
        if (!empty(auth()->guard()->user()->id)) {
            $data = Client::where('user_id', $user_id)->latest('id');

            if(!empty($request->keyword))
                $data = $data->where('client_name','like','%'.$request->keyword.'%');

            if(!empty($request->export)){
                $data = $data->get()->toArray();
                $this->csvClientExport($data);
            }

        $data = $data->paginate(15);

       // $data = Client::where('user_id', $user_id)->paginate(25);
       // $category=ArticleCategory::orderby('title')->get();
        return view('front.client.index',compact('data'));
    } else {
        return redirect()->route('front.user.login');
    }
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('client', 'Create client');
        $currencies = Currency::all();
        $client_group = DB::table('client_groups')->get();
        $charges_limit = DB::table('charges_limit')->get();
        return view('front.client.create',compact('currencies','charges_limit','client_group'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email_id'=>'required_if:phone_number,=,null|unique:clients,email_id',
            'phone_number'=>'required_if:email_id,=,null|unique:clients,phone_number',
            'occupation' => 'required|regex:/^[\pL\s\-]+$/u',
            'currency' => 'required',
            'commercials' => 'required',
            'client_group' => 'nullable',
            'rate' => 'required',
            'link' => 'nullable|url',
            'image' => 'required|mimes:jpeg,jpg,png,gif|required|max:500'
        ]);
        $params = $request->except('_token');

        $client = $this->ClientRepository->createClient($params);

        if (!$client) {
            return redirect()->back()->with('failure','Error occurred while creating client.', 'error', true, true);
        }
        return redirect()->route('front.client.index')->with('success', 'client has been created successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $client = $this->ClientRepository->findClientById($id);
        //dd($client);
        $currencies = Currency::all();
        $charges_limit = DB::table('charges_limit')->get();
        $client_group = DB::table('client_groups')->get();
        $this->setPageTitle('client', 'Edit client : ' . $client->occupation);
        return view('front.client.edit', compact('client','currencies','charges_limit','client_group'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'client_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email_id' => 'nullable|email|unique:clients,email_id,'.$request->id,
            'phone_number' => 'nullable|numeric|digits:10|unique:clients,phone_number,'.$request->id,
            'occupation' => 'required|regex:/^[\pL\s\-]+$/u',
            'currency' => 'required',
            'commercials' => 'required',
            'client_group' => 'nullable',
            'rate' => 'required',
            'link' => 'nullable|url',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:500'
        ]);
        $params = $request->except('_token');
        $client = $this->ClientRepository->updateClient($params);

        if (!$client) {
            return redirect()->back()->with('failure','Error occurred while updating client.', 'error', true, true);
        }
        // return $this->responseRedirectBack('client has been updated successfully', 'success', false, false);
        return redirect()->route('front.client.index')->with('success', 'Client has been updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $client = $this->ClientRepository->deleteClient($id);

        if (!$client) {
            return redirect()->back()->with('failure','Error occurred while deleting client.', 'error', true, true);
        }
        return redirect()->back()->with('success','client has been deleted successfully', 'success', false, false);
    }
    //for show client
    public function detail(Request $request,$id)
    {

        if (!empty(auth()->guard()->user()->id)) {
            $data=Client::where('id',$id)->first();
            //dd($data);
            return view('front.client.detail', compact('data'));
        } else {
            return redirect()->route('front.user.login');
        }
    }
    public function group(Request $request)
    {
       //dd($request->all());
       $validator = Validator::make($request->all(), [
            'group_name'      =>  'required|unique:client_groups',

        ]);
        if (!$validator->fails()) {
            $data = new ClientGroup;
            $data->group_name = !empty($request->group_name) ? $request->group_name : '';
            $data->save();
            if (!$data) {
                return redirect()->back()->with('failure','Error occurred while updating group.');
            }
            return redirect()->back()->with('success','Group has been updated successfully');
        }
        else {
           return redirect()->back()->with('failure' ,'Group name already been taken .');
        }
    }


    public function csvClientExport($data)
    {
        if (count($data) > 0) {
            $delimiter = ",";
            $filename = "Clients-". Auth::guard('web')->user()->first_name .'-'. Auth::guard('web')->user()->last_name  ."-".date('Y-m-d').".csv";

            // Create a file pointer
            $f = fopen('php://memory', 'w');

            // Set column headers
            $fields = array('SR', 'Name', 'Email', 'Phone Number', 'Company Name','Website');
            fputcsv($f, $fields, $delimiter);

            $count = 1;

            foreach($data as $row) {
                $datetime = date('j F, Y h:i A', strtotime($row['created_at']));

                $lineData = array(
                    $count,
                    $row['client_name'],
                    $row['email_id'],
                    $row['phone_number'],
                    $row['company_name'],
                    $row['link'],
                    $datetime
                );

                fputcsv($f, $lineData, $delimiter);

                $count++;
            }

            // Move back to beginning of file
            fseek($f, 0);

            // Set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');

            //output all remaining data on a file pointer
            fpassthru($f);
            exit;
        }
    }
}
