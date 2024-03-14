<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\VendorRequest;


class VendorRequestController extends Controller
{
    /**
     * Display a listing of pending vendor requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $pendingRequests = VendorRequest::where('status', 'pending')->get();
        return view('vendor_requests.pending', compact('pendingRequests'));
    }

    /**
     * Display a listing of approved vendor requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function approved()
    {
        $approvedRequests = VendorRequest::where('status', 'approved')->get();
        return view('vendor_requests.approved', compact('approvedRequests'));
    }

    /**
     * Approve a vendor request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, $id)
    {
        $vendorRequest = VendorRequest::findOrFail($id);
        $vendorRequest->status = 'approved';
        $vendorRequest->save();

        return redirect()->route('pending-vendor-requests')->with('success', 'Vendor request approved successfully.');
    }
}
