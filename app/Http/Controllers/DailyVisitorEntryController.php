<?php

namespace App\Http\Controllers;

use App\Models\DailyVisitorEntry;
use Illuminate\Http\Request;

class DailyVisitorEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pages/Login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dashboard()
    {
        DailyVisitorEntry::whereNull('ExitSignature')
        ->update([
            'ExitTime' => date('H:i'),
            'ExitDate' => date('Y-m-d'),
        ]);
        $Visitors = DailyVisitorEntry::orderBy('EntryDate', 'DESC')->orderBy('EntryTime', 'DESC')->get(); 
        $TotalVisitors = DailyVisitorEntry::where(function($query) {
                                                $query->where('EntryDate', date('Y-m-d'))
                                                        ->orWhere('ExitDate', date('Y-m-d'));
                                            })
                                            ->orWhere(function($query) {
                                                $query->where('EntryDate', '<', date('Y-m-d'))
                                                        ->where('ExitDate', '>', date('Y-m-d'));
                                            })
                                            ->get(); 
        $TotalVisitors_SignedIn = DailyVisitorEntry::where('EntrySignature', 'on')
                                                        ->where(function($query1) {
                                                            $query1->where(function($query) {
                                                                $query->where('EntryDate', date('Y-m-d'))
                                                                        ->orWhere('ExitDate', date('Y-m-d'));
                                                            });
                                                            $query1->orWhere(function($query) {
                                                                $query->where('EntryDate', '<', date('Y-m-d'))
                                                                        ->where('ExitDate', '>', date('Y-m-d'));
                                                            });
                                                        })
                                                        ->get(); 
            $TotalVisitors_SignedOut = DailyVisitorEntry::where('ExitSignature', 'on')
                                                            ->where(function($query1) {
                                                                $query1->where(function($query) {
                                                                    $query->where('EntryDate', date('Y-m-d'))
                                                                            ->orWhere('ExitDate', date('Y-m-d'));
                                                                });
                                                                $query1->orWhere(function($query) {
                                                                    $query->where('EntryDate', '<', date('Y-m-d'))
                                                                            ->where('ExitDate', '>', date('Y-m-d'));
                                                                });
                                                            })
                                                        ->get();
                $TotalVisitors_AfterClosingHours = DailyVisitorEntry::where('ExitDate', '>=', date('Y-m-d'))->where('ExitTime', '>', '17:00')
                                                                        ->where(function($query1) {
                                                                            $query1->where(function($query) {
                                                                                $query->where('EntryDate', date('Y-m-d'))
                                                                                        ->orWhere('ExitDate', date('Y-m-d'));
                                                                            });
                                                                            $query1->orWhere(function($query) {
                                                                                $query->where('EntryDate', '<', date('Y-m-d'))
                                                                                        ->where('ExitDate', '>', date('Y-m-d'));
                                                                            });
                                                                        })
                                                                    ->get();
        return view('Pages.Dashboard', [
            'Visitors' => $Visitors,
            'TotalVisitors' => count($TotalVisitors),
            'TotalVisitors_SignedIn' => count($TotalVisitors_SignedIn),
            'TotalVisitors_SignedOut' => count($TotalVisitors_SignedOut),
            'TotalVisitors_AfterClosingHours' => count($TotalVisitors_AfterClosingHours),
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // dd($request->EntrySignature);
        DailyVisitorEntry::insert([
           'Name' => $request->Name,
           'Address' => $request->Address,
           'PersonnelClass' => $request->PersonnelClass,
           'SecurityStaff' => $request->SecurityStaff,
           'WhomToSee' => $request->WhomToSee,
           'CompanyVisiting' => $request->CompanyVisiting,
           'EntryDate' => $request->EntryDate, 
           'EntryTime' => $request->EntryTime, 
           'EntrySignature' => $request->EntrySignature, 
           'TagNumber' => $request->TagNumber,
           'ExitDate' => $request->ExitDate ?? date('Y-m-d'), 
           'ExitTime' => $request->ExitTime ?? date('H:i'),
           'ExitSignature' => $request->ExitSignature, 
           'ApprovedBy' => $request->ApprovedBy,
           'PhoneNumber' => $request->PhoneNumber,
           'PurposeOfVisiting' => $request->PurposeOfVisiting,
           'DateIn' => date('F j, Y'), 
           'TimeIn' => date("g:i a"),  
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyVisitorEntry $dailyVisitorEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyVisitorEntry $dailyVisitorEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Id)
    {     
        DailyVisitorEntry::where('id', $Id)
        ->update([
            'Name' => $request->EditName,
            'Address' => $request->EditAddress,
            'PersonnelClass' => $request->EditPersonnelClass,
            'SecurityStaff' => $request->EditSecurityStaff,
            'WhomToSee' => $request->EditWhomToSee,
            'CompanyVisiting' => $request->EditCompanyVisiting,
            'EntryDate' => $request->EditEntryDate, 
            'EntryTime' => $request->EditEntryTime, 
            'EntrySignature' => $request->EditEntrySignature, 
            'TagNumber' => $request->EditTagNumber,
            'ExitDate' => $request->EditExitDate, 
            'ExitTime' => $request->EditExitTime,
            'ExitSignature' => $request->EditExitSignature, 
            'ApprovedBy' => $request->EditApprovedBy,
            'PhoneNumber' => $request->EditPhoneNumber,
            'PurposeOfVisiting' => $request->EditPurposeOfVisiting,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Id)
    { 
        DailyVisitorEntry::where('id', $Id)->delete();
        return back();
    }
}
