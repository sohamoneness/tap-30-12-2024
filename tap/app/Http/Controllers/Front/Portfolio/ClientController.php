<?php

namespace App\Http\Controllers\Front\Portfolio;

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
        $data = (object)[];
        $user_id = auth()->guard('web')->user()->id;
        $data->clients = Client::where('user_id', $user_id)->get();
       // $category=ArticleCategory::orderby('title')->get();
        return view('front.portfolio.client.index',compact('data'));
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
        return view('front.portfolio.client.create',compact('currencies','charges_limit','client_group'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'required',
            'occupation' => 'required',
            'currency' => 'required',
            'commercials' => 'required',
            'rate' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|required|max:500'
        ]);
        $params = $request->except('_token');

        $client = $this->ClientRepository->createClient($params);

        if (!$client) {
            return redirect()->back()->with('failure','Error occurred while creating client.', 'error', true, true);
        }
        return redirect()->route('front.portfolio.client.index')->with('success', 'client has been created successfully', 'success', false, false);
    }
    
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $client = $this->ClientRepository->findClientById($id);
        $currencies = Currency::all();
        $charges_limit = DB::table('charges_limit')->get();
        $client_group = DB::table('client_groups')->get();
        $this->setPageTitle('client', 'Edit client : ' . $client->occupation);
        return view('front.portfolio.client.edit', compact('client','currencies','charges_limit','client_group'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'nullable',
            'occupation' => 'nullable',
            'currency' => 'required',
            'commercials' => 'required',
            'rate' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:500'
        ]);
        $params = $request->except('_token');
        $client = $this->ClientRepository->updateClient($params);

        if (!$client) {
            return redirect()->back()->with('failure','Error occurred while updating client.', 'error', true, true);
        }
        // return $this->responseRedirectBack('client has been updated successfully', 'success', false, false);
        return redirect()->route('front.portfolio.client.index')->with('success', 'Client has been updated successfully', 'success', false, false);
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
}
