@extends('Layouts.1') 

@section('Content')
    <div class="card-list">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card blue">
                    <div class="title">Visitors</div>
                    <i class="zmdi zmdi-upload"></i>
                    <div class="value">{{ $TotalVisitors }} ({{ $PercentageOfVisitors }}%)</div>
                    <div class="stat">SIGNED IN<b>{{ $TotalVisitors_SignedIn }} ({{ $PercentageOfVisitors_SignedIn }}%)</b></div>
                    <div class="stat">SIGNED OUT<b>{{ $TotalVisitors_SignedOut }} ({{ $PercentageOfVisitors_SignedOut }}%)</b></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card green">
                    <div class="title">contractors</div>
                    <i class="zmdi zmdi-upload"></i>
                    <div class="value">{{ $TotalContractors }} ({{ $PercentageOfContractors }}%)</div>
                    <div class="stat">SIGNED IN<b>{{ $TotalContractors_SignedIn }} ({{ $PercentageOfContractors_SignedIn }}%)</b></div>
                    <div class="stat">SIGNED OUT<b>{{ $TotalContractors_SignedOut }} ({{ $PercentageOfContractors_SignedOut }}%)</b></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card orange">
                    <div class="title">vendors</div>
                    <i class="zmdi zmdi-download"></i>
                    <div class="value">{{ $TotalVendors }} ({{ $PercentageOfVendors }}%)</div>
                    <div class="stat">SIGNED IN<b>{{ $TotalVendors_SignedIn }} ({{ $PercentageOfVendors_SignedIn }}%)</b></div>
                    <div class="stat">SIGNED OUT<b>{{ $TotalVendors_SignedOut }} ({{ $PercentageOfVendors_SignedOut }}%)</b></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card red">
                    <div class="title">Npa Personnel</div>
                    <i class="zmdi zmdi-download"></i>
                    <div class="value">{{ $TotalNpaPersonnel }} ({{ $PercentageOfNpaPersonnel }}%)</div>
                    <div class="stat">SIGNED IN<b>{{ $TotalNpaPersonnel_SignedIn }} ({{ $PercentageOfNpaPersonnel_SignedIn }}%)</b></div>
                    <div class="stat">SIGNED OUT<b>{{ $TotalNpaPersonnel_SignedOut }} ({{ $PercentageOfNpaPersonnel_SignedOut }}%)</b></div>
                </div>
            </div>
        </div>
    </div>
    <div class="projects mb-4">
        <div class="projects-inner">
            <header class="projects-header">
                <div class="title">DAILY VISITOR ENTRY</div>
                <div class="count">| Security Department</div>
                <i class="zmdi zmdi-download"></i>
            </header>
            <table class="projects-table">
                <thead>
                    <tr>
                        <th>Visitor (Details)</th>
                        <th>Whom to see</th>
                        <th>Entry Time</th>
                        <th>Exit Time</th>
                        <th></th> 
                        <th>Approved By</th>
                    </tr>
                </thead>
                @unless (count($Visitors) > 0)
                <tr>
                    <td>No visitor entry records..</td>
                </tr>
                @endunless
                @foreach ($Visitors as $Visitor) 
                @php
                    if (empty($Visitor->ExitSignature)) {
                        $ExitTime_ = date('H:i');
                        $ExitDate_ = date('Y-m-d');
                    } else {
                        $ExitTime_ = $Visitor->ExitTime;
                        $ExitDate_ = $Visitor->ExitDate;
                    }
                    $EntryTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $Visitor->EntryDate . ' ' . $Visitor->EntryTime);
                    $ExitTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $ExitDate_ . ' ' . $ExitTime_);
                    $MinutesDifference = $EntryTime->diffInMinutes($ExitTime);
                    $HoursDifference = $EntryTime->diffInHours($ExitTime); 
                @endphp
                <tr>
                    <td>
                        <p>{{ $Visitor->Name }} :: {{ $Visitor->PhoneNumber }}</p>
                        <p class="
                        @if ($Visitor->PersonnelClass == 'VISITOR') 
                            VISITOR
                        @elseif ($Visitor->PersonnelClass == 'CONTRACTOR')
                            CONTRACTOR
                        @elseif ($Visitor->PersonnelClass == 'VENDOR')
                            VENDOR
                        @elseif ($Visitor->PersonnelClass == 'NPA PERSONNEL')
                            NPA
                        @endif
                        Personnel">{{ $Visitor->PersonnelClass }}</p>
                        <p>{{ $Visitor->Address }}</p>
                    </td>
                    <td>
                        <p>{{ $Visitor->WhomToSee }}</p>
                        <p class="text-success-x">{{ $Visitor->CompanyVisiting }}</p>
                    </td>
                    <td class="member">
                        <div class="member-info">
                            <p>{{ date("h:i A", strtotime($Visitor->EntryTime)) }} (Signed in) <em class="Date SignedIn">{{ $Visitor->EntryDate }}</em></p>
                            <p>ISSUED TAG: [{{ $Visitor->TagNumber }}]</p>
                        </div>
                    </td>
                    <td>
                        <p>
                            @if (empty($Visitor->ExitSignature))
                                Currently in the yard ..
                            @else
                            {{ date("h:i A", strtotime($Visitor->ExitTime)) }} (Signed out) <em class="Date SignedOut">{{ $Visitor->ExitDate }}</em>
                            @endif
                        </p>
                        <p>DURATION: 
                            @if ($MinutesDifference < 60)
                                {{ round($MinutesDifference) }} min(s)
                            @else
                                {{ round($HoursDifference) }} {{ $HoursDifference > 1 ? 'HRS' : 'HOUR' }}
                            @endif 
                        </p>
                    </td>
                    <td>
                        <div class="action-x"> 
                            <div class="row">
                                <div class="delete-confirm small">
                                    <button class="delete">
                                        <i class="fa fa-trash-o fa-lg"></i>
                                    </button>
                                    <button class="yes">
                                        <span class="d-none">{{ $Visitor->id }}</span>
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <button class="no">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </div>
                            </div>
                            <svg class="EditEntryButton" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z"/></svg>
                            <span class="d-none">{{ $Visitor->id }}</span>
                            <span class="d-none">{{ $Visitor->Name }}</span>
                            <span class="d-none">{{ $Visitor->Address }}</span>
                            <span class="d-none">{{ $Visitor->WhomToSee }}</span>
                            <span class="d-none">{{ $Visitor->CompanyVisiting }}</span>
                            <span class="d-none">{{ $Visitor->TagNumber }}</span>
                            <span class="d-none">{{ $Visitor->EntryDate }}</span>
                            <span class="d-none">{{ $Visitor->EntryTime }}</span>
                            <span class="d-none">{{ $Visitor->EntrySignature }}</span>
                            <span class="d-none">{{ $Visitor->ExitDate }}</span>
                            <span class="d-none">{{ $Visitor->ExitTime }}</span>
                            <span class="d-none">{{ $Visitor->ExitSignature }}</span>
                            <span class="d-none">{{ $Visitor->ApprovedBy }}</span>
                            <span class="d-none">{{ $Visitor->PhoneNumber }}</span>
                            <span class="d-none">{{ $Visitor->PurposeOfVisiting }}</span>
                            <span class="d-none">{{ $Visitor->PersonnelClass }}</span>
                            <span class="d-none">{{ $Visitor->SecurityStaff }}</span>
                        </div>
                    </td> 
                    <td class="status">
                        <span class="status-text status-orange">{{ $Visitor->ApprovedBy }}</span>
                    </td>
                </tr>
                @endforeach 
            </table>
        </div>
    </div>
    <div class="chart-data">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="chart radar-chart dark">
                    <div class="actions">
                        <button type="button" class="btn btn-link" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                    <h3 class="title">Visitor Trends</h3>
                    <p class="tagline">Yearly</p>
                    <canvas height="400" id="radarChartDark"></canvas>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="chart bar-chart light">
                    <div class="actions">
                        <button type="button" class="btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                    <h3 class="title">Monthly Visits</h3>
                    <p class="tagline">2024 (contractors/vendors and visitors)</p>
                    <canvas height="400" id="barChartHDark"></canvas>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="chart doughnut-chart dark">
                    <div class="actions">
                        <button type="button" class="btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                    <h3 class="title">Quarterly Visitor Analysis</h3>
                    <p class="tagline">2024 (visitor trends by quarter)</p>
                    <canvas height="400" id="doughnutChartDark"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection