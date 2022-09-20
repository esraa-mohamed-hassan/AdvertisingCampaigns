<?php

namespace App\Http\Controllers\Campaigns;

use App\Http\Controllers\Controller;
use App\Models\Campaigns\AdvertisingCampaigns;
use Illuminate\Http\Request;

class AdvertisingCampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = AdvertisingCampaigns::latest()->paginate(5);

        return view('Campaigns.index',compact('campaigns'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Campaigns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'from' => 'required|date',
            'to' => 'required|date',
            'total' => 'required|numeric',
            'daily_budget' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['images'] = "$profileImage";
        }

        AdvertisingCampaigns::create($input);

        return redirect()->route('campaigns.index')
                        ->with('success','AdvertisingCampaigns created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdvertisingCampaigns  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(AdvertisingCampaigns $campaign)
    {
        return view('Campaigns.show',compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdvertisingCampaigns  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvertisingCampaigns $campaign)
    {
        return view('Campaigns.edit',compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdvertisingCampaigns  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertisingCampaigns $campaign)
    {
        $request->validate([
            'name' => 'required',
            'from' => 'required|date',
            'to' => 'required|date',
            'total' => 'required|numeric',
            'daily_budget' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['images'] = "$profileImage";
        }else{
            unset($input['images']);
        }

        $campaign->update($input);

        return redirect()->route('campaigns.index')
                        ->with('success','AdvertisingCampaigns updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdvertisingCampaigns  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertisingCampaigns $campaign)
    {
        $campaign->delete();

        return redirect()->route('campaigns.index')
                        ->with('success','AdvertisingCampaigns deleted successfully');
    }

}
