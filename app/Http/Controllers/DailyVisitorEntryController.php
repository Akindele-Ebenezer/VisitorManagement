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
        $TotalVisitors = DailyVisitorEntry::where('PersonnelClass', 'VISITOR')->where(function($query) {
                                                $query->where('EntryDate', date('Y-m-d'))
                                                        ->orWhere('ExitDate', date('Y-m-d'));
                                            })
                                            ->orWhere(function($query) {
                                                $query->where('EntryDate', '<', date('Y-m-d'))
                                                        ->where('ExitDate', '>', date('Y-m-d'));
                                            })
                                            ->get();
        $TotalContractors = DailyVisitorEntry::where('PersonnelClass', 'CONTRACTOR')->where(function($query) {
                                                $query->where('EntryDate', date('Y-m-d'))
                                                        ->orWhere('ExitDate', date('Y-m-d'));
                                            })
                                            ->orWhere(function($query) {
                                                $query->where('EntryDate', '<', date('Y-m-d'))
                                                        ->where('ExitDate', '>', date('Y-m-d'));
                                            })
                                            ->get();
        $TotalVendors = DailyVisitorEntry::where('PersonnelClass', 'VENDOR')->where(function($query) {
                                            $query->where('EntryDate', date('Y-m-d'))
                                                    ->orWhere('ExitDate', date('Y-m-d'));
                                        })
                                        ->orWhere(function($query) {
                                            $query->where('EntryDate', '<', date('Y-m-d'))
                                                    ->where('ExitDate', '>', date('Y-m-d'));
                                        })
                                        ->get();   
        $TotalNpaPersonnel = DailyVisitorEntry::where('PersonnelClass', 'NPA PERSONNEL')->where(function($query) {
                                            $query->where('EntryDate', date('Y-m-d'))
                                                    ->orWhere('ExitDate', date('Y-m-d'));
                                        })
                                        ->orWhere(function($query) {
                                            $query->where('EntryDate', '<', date('Y-m-d'))
                                                    ->where('ExitDate', '>', date('Y-m-d'));
                                        })
                                        ->get();  
                                        
        $TotalEntries = count($TotalVisitors) + count($TotalContractors) + count($TotalVendors) + count($TotalNpaPersonnel);
        $PercentageOfVisitors = (count($TotalVisitors) / $TotalEntries) * 100;
        $PercentageOfContractors = (count($TotalContractors) / $TotalEntries) * 100;
        $PercentageOfVendors = (count($TotalVendors) / $TotalEntries) * 100;
        $PercentageOfNpaPersonnel = (count($TotalNpaPersonnel) / $TotalEntries) * 100;

        $TotalVisitors_SignedIn = DailyVisitorEntry::where('PersonnelClass', 'VISITOR')->where('EntrySignature', 'on')
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
        $TotalContractors_SignedIn = DailyVisitorEntry::where('PersonnelClass', 'CONTRACTOR')->where('EntrySignature', 'on')
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
        $TotalVendors_SignedIn = DailyVisitorEntry::where('PersonnelClass', 'VENDOR')->where('EntrySignature', 'on')
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
        $TotalNpaPersonnel_SignedIn = DailyVisitorEntry::where('PersonnelClass', 'NPA PERSONNEL')->where('EntrySignature', 'on')
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

        $TotalVisitors_SignedOut = DailyVisitorEntry::where('PersonnelClass', 'VISITOR')->where('ExitSignature', 'on')
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
        $TotalContractors_SignedOut = DailyVisitorEntry::where('PersonnelClass', 'CONTRACTOR')->where('ExitSignature', 'on')
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
        $TotalVendors_SignedOut = DailyVisitorEntry::where('PersonnelClass', 'VENDOR')->where('ExitSignature', 'on')
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
        $TotalNpaPersonnel_SignedOut = DailyVisitorEntry::where('PersonnelClass', 'NPA PERSONNEL')->where('ExitSignature', 'on')
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
                                        
            $TotalSignedIn = (count($TotalVisitors_SignedIn) + count($TotalContractors_SignedIn) + count($TotalVendors_SignedIn) + count($TotalNpaPersonnel_SignedIn)) == 0 ? 1 : (count($TotalVisitors_SignedIn) + count($TotalContractors_SignedIn) + count($TotalVendors_SignedIn) + count($TotalNpaPersonnel_SignedIn));
            $PercentageOfVisitors_SignedIn = (count($TotalVisitors_SignedIn) / $TotalSignedIn) * 100;
            $PercentageOfContractors_SignedIn = (count($TotalContractors_SignedIn) / $TotalSignedIn) * 100;
            $PercentageOfVendors_SignedIn = (count($TotalVendors_SignedIn) / $TotalSignedIn) * 100;
            $PercentageOfNpaPersonnel_SignedIn = (count($TotalNpaPersonnel_SignedIn) / $TotalSignedIn) * 100;   
                                        
            $TotalSignedOut = (count($TotalVisitors_SignedOut) + count($TotalContractors_SignedOut) + count($TotalVendors_SignedOut) + count($TotalNpaPersonnel_SignedOut)) == 0 ? 1 : (count($TotalVisitors_SignedOut) + count($TotalContractors_SignedOut) + count($TotalVendors_SignedOut) + count($TotalNpaPersonnel_SignedOut));
            $PercentageOfVisitors_SignedOut = (count($TotalVisitors_SignedOut) / $TotalSignedOut) * 100;
            $PercentageOfContractors_SignedOut = (count($TotalContractors_SignedOut) / $TotalSignedOut) * 100;
            $PercentageOfVendors_SignedOut = (count($TotalVendors_SignedOut) / $TotalSignedOut) * 100;
            $PercentageOfNpaPersonnel_SignedOut = (count($TotalNpaPersonnel_SignedOut) / $TotalSignedOut) * 100;
 
            $CurrentlyInTheYard = \App\Models\DailyVisitorEntry::whereNull('ExitSignature')
            ->where(function($query1) {
                                            $query1->where(function($query) {
                                                $query->where('EntryDate', date('Y-m-d'))
                                                        ->orWhere('ExitDate', date('Y-m-d'));
                                            });
                                            $query1->orWhere(function($query) {
                                                $query->where('EntryDate', '<', date('Y-m-d'))
                                                        ->where('ExitDate', '>', date('Y-m-d'));
                                            });
                                        })->orderBy('EntryDate', 'DESC')->orderBy('EntryTime', 'DESC')->get();  
         
            $SignedOut = \App\Models\DailyVisitorEntry::whereNotNull('ExitSignature')
            ->where(function($query1) {
                                            $query1->where(function($query) {
                                                $query->where('EntryDate', date('Y-m-d'))
                                                        ->orWhere('ExitDate', date('Y-m-d'));
                                            });
                                            $query1->orWhere(function($query) {
                                                $query->where('EntryDate', '<', date('Y-m-d'))
                                                        ->where('ExitDate', '>', date('Y-m-d'));
                                            });
                                        })->orderBy('EntryDate', 'DESC')->orderBy('EntryTime', 'DESC')->get();  
    
        return view('Pages.Dashboard', [
            'Visitors' => $Visitors,
            'TotalVisitors' => count($TotalVisitors),
            'TotalContractors' => count($TotalContractors),
            'TotalVendors' => count($TotalVendors),
            'TotalNpaPersonnel' => count($TotalNpaPersonnel),
            'TotalVisitors' => count($TotalVisitors),
            'PercentageOfVisitors' => round($PercentageOfVisitors, 1),
            'PercentageOfContractors' => round($PercentageOfContractors, 1),
            'PercentageOfVendors' => round($PercentageOfVendors, 1),
            'PercentageOfNpaPersonnel' => round($PercentageOfNpaPersonnel, 1),
            'PercentageOfVisitors_SignedIn' => round($PercentageOfVisitors_SignedIn, 1),
            'PercentageOfContractors_SignedIn' => round($PercentageOfContractors_SignedIn, 1),
            'PercentageOfVendors_SignedIn' => round($PercentageOfVendors_SignedIn, 1),
            'PercentageOfNpaPersonnel_SignedIn' => round($PercentageOfNpaPersonnel_SignedIn, 1),
            'PercentageOfVisitors_SignedOut' => round($PercentageOfVisitors_SignedOut, 1),
            'PercentageOfContractors_SignedOut' => round($PercentageOfContractors_SignedOut, 1),
            'PercentageOfVendors_SignedOut' => round($PercentageOfVendors_SignedOut, 1),
            'PercentageOfNpaPersonnel_SignedOut' => round($PercentageOfNpaPersonnel_SignedOut, 1),
            'TotalVisitors_SignedIn' => count($TotalVisitors_SignedIn),
            'TotalContractors_SignedIn' => count($TotalContractors_SignedIn),
            'TotalVendors_SignedIn' => count($TotalVendors_SignedIn),
            'TotalNpaPersonnel_SignedIn' => count($TotalNpaPersonnel_SignedIn),
            'TotalVisitors_SignedOut' => count($TotalVisitors_SignedOut),
            'TotalContractors_SignedOut' => count($TotalContractors_SignedOut),
            'TotalVendors_SignedOut' => count($TotalVendors_SignedOut),
            'TotalNpaPersonnel_SignedOut' => count($TotalNpaPersonnel_SignedOut),
            'TotalVisitors_SignedIn' => count($TotalVisitors_SignedIn),
            'TotalVisitors_SignedOut' => count($TotalVisitors_SignedOut),
            'CurrentlyInTheYard' => count($CurrentlyInTheYard),
            'SignedOut' => count($SignedOut),
            // 'TotalVisitors_AfterClosingHours' => count($TotalVisitors_AfterClosingHours),
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
           'ExitDate' => $request->ExitDate, 
           'ExitTime' => $request->ExitTime,
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
