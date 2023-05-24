<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FollowUp;
use App\Models\Lead;
use App\Service\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    use ResponseService;
    protected $paginationTheme = 'bootstrap';
    public function index()
    {
        if (Auth::user()->role == 1) {
            $leads = Lead::orderBy('id', 'desc')->with('user')->get();
            return view('admin.admin.leads', compact('leads'));
        }else{
            $leads = Lead::where(['user_id' => auth()->id(), 'type' => 'lead'])->orderBy('id', 'desc')->get();
            return view('admin.leads.index', compact('leads'));
        }
       
    }
    public function create()
    {
        return view('admin.leads.create');
    }



    public function store(Request $request)
    {
        try {
            $leads = new Lead();
            $leads->user_id = auth()->id();
            $leads->platform = $request->platform;
            $leads->customer_id = $request->customer_id;
            $leads->full_name = $request->full_name;
            $leads->company_name = $request->company_name;
            $leads->contact_no = $request->contact_no;
            $leads->email = $request->email;
            $leads->message = $request->message;
            $leads->product_name = $request->product_name;
            $leads->job_id = $request->job_id;
            $leads->length = $request->length;
            $leads->width = $request->width;
            $leads->depth = $request->depth;
            $leads->unit = $request->unit;
            $leads->material = $request->material;
            $leads->printing = $request->printing;
            $leads->finishing = $request->finishing;
            $leads->options = $request->options;
            $leads->add_ons = $request->add_ons;
            $leads->project = $request->project;
            $leads->address_1 = $request->address1;
            $leads->address_2 = $request->address2;
            $leads->city = $request->city;
            $leads->state = $request->state;
            $leads->type = 'lead';
            $leads->country = $request->country;
            $leads->status = $this->custom_role(Auth::user()->role);
            $leads->tracking_id = json_encode($request->tracking_id);
            $leads->tracking_service = json_encode($request->tracking_service);
            $leads->save();
            return $this->response(true, ['Leads creates successfully']);
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        return view('admin.leads.update', compact('lead'));
    }

    public function update(Request $request)
    {
        try {
            $leads = Lead::findOrFail($request->id);
            $leads->user_id = auth()->id();
            $leads->platform = $request->platform;
            $leads->customer_id = $request->customer_id;
            $leads->full_name = $request->full_name;
            $leads->company_name = $request->company_name;
            $leads->contact_no = $request->contact_no;
            $leads->email = $request->email;
            $leads->message = $request->message;
            $leads->product_name = $request->product_name;
            $leads->job_id = $request->job_id;
            $leads->length = $request->length;
            $leads->width = $request->width;
            $leads->depth = $request->depth;
            $leads->unit = $request->unit;
            $leads->material = $request->material;
            $leads->printing = $request->printing;
            $leads->finishing = $request->finishing;
            $leads->options = $request->options;
            $leads->add_ons = $request->add_ons;
            $leads->project = $request->project;
            $leads->address_1 = $request->address1;
            $leads->address_2 = $request->address2;
            $leads->city = $request->city;
            $leads->state = $request->state;
            $leads->country = $request->country;
            $leads->status = $this->custom_role(Auth::user()->role);
            $leads->tracking_id = json_encode($request->tracking_id);
            $leads->tracking_service = json_encode($request->tracking_service);
            $leads->save();
            return $this->response(true, ['Leads Update successfully']);
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }

    public function delete(Request $request)
    {
        try {
            $lead = Lead::findOrFail($request->id)->delete();
            return $this->response(true, ['Delete successfully']);
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }

    public function confirm_to_sale(Request $request)
    {
        try {

            $lead = Lead::findOrFail($request->id);
            $lead->type = 'sale';
            $lead->save();
            return $this->response(true, ['Confirm sale successfully']);
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }

    public function follow_up_view($id)
    {
        $follows = FollowUp::where(['user_id' => auth()->id(), 'lead_id' => $id])->orderBy('id', 'desc')->simplePaginate(5);
        return view('admin.leads.follow-up', compact('id', 'follows'));
    }

    public function add_follow(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'message' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->response(false, $validator->errors()->all());
            } else {
                $follow = new FollowUp();
                $follow->user_id = auth()->id();
                $follow->lead_id = $request->id;
                $follow->message = $request->message;
                $follow->save();
            }
            return $this->response(true, ['Follow add successfully']);
        } catch (\Throwable $th) {
            return $this->response(false, [$th->getMessage()]);
        }
    }
}
