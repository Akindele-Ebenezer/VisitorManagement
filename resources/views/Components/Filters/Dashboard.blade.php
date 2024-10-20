@php
if (isset($_GET['FilterValue']) AND ($_GET['FilterValue'] == '*') AND 
(isset($_GET['PersonnelClass']))) {
    $Visitors = \App\Models\DailyVisitorEntry::where('PersonnelClass', $_GET['PersonnelClass'])
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
}
if (isset($_GET['FilterValue']) AND ($_GET['FilterValue'] == 'CurrentlyInTheYard') AND 
(isset($_GET['PersonnelClass']))) {
    $Visitors = \App\Models\DailyVisitorEntry::where('PersonnelClass', $_GET['PersonnelClass'])->whereNull('ExitSignature')
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
}

if (isset($_GET['FilterValue']) AND ($_GET['FilterValue'] == 'SignedOut') AND 
(isset($_GET['PersonnelClass']))) {
    $Visitors = \App\Models\DailyVisitorEntry::where('PersonnelClass', $_GET['PersonnelClass'])->whereNotNull('ExitSignature')
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
}
///////////
    if ((isset($_GET['FilterValue'])) AND 
        (!isset($_GET['PersonnelClass']))) {
            if ($_GET['FilterValue'] == 'CurrentlyInTheYard') {
                $Visitors = \App\Models\DailyVisitorEntry::whereNull('ExitSignature')
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
            }
            
            if ($_GET['FilterValue'] == 'SignedOut') {
                $Visitors = \App\Models\DailyVisitorEntry::whereNotNull('ExitSignature')
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
            }
        }
@endphp