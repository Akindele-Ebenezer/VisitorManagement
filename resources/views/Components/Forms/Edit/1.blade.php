<form class="EditEntryForm">
  <div class="Wrapper">
    <div class="demo-page d-none vh-100 vw-100 EditEntryForm">
      <span class="item-1 Close">
        <span class="inner">
          <span class="label">Close</span>
        </span>
      </span>
      <div class="demo-page-navigation">
        <nav>
          <ul> 
            <li>
              <a href="#structure">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                  <polygon points="12 2 2 7 12 12 22 7 12 2" />
                  <polyline points="2 17 12 22 22 17" />
                  <polyline points="2 12 12 17 22 12" />
                </svg>
                Edit Daily Visitor Entry</a>
            </li>
            <li>
              <a href="#input-types">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
                  <line x1="21" y1="10" x2="3" y2="10" />
                  <line x1="21" y1="6" x2="3" y2="6" />
                  <line x1="21" y1="14" x2="3" y2="14" />
                  <line x1="21" y1="18" x2="3" y2="18" />
                </svg>
                Entry Details</a>
            </li>
            <li>
              <a href="#exit">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square">
                  <polyline points="9 11 12 14 22 4" />
                  <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                </svg>
                Exit Details</a>
            </li>  
            <li>
              <a href="#approval">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                  <line x1="16" y1="2" x2="16" y2="6" />
                  <line x1="8" y1="2" x2="8" y2="6" />
                  <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Approval</a>
            </li> 
          </ul>
        </nav>
      </div>
      <main class="demo-page-content">  
        <section>
          <div class="href-target" id="structure"></div>
          <h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
              <polygon points="12 2 2 7 12 12 22 7 12 2" />
              <polyline points="2 17 12 22 22 17" />
              <polyline points="2 12 12 17 22 12" />
            </svg>
            EDIT DAILY VISITOR ENTRY
          </h1>
          <p>
            Update form to ammend visitor entry information, entering through the Gate for Security at L.T.T | DEPASA MARINE.
            <code>SECURITY DEPARTMENT</code> <code>DEPASA MARINE INT'L</code> <code>L.T.T</code> <code>CONTINENTAL SHIPYARD</code> <br> If any changes must be made, kindly update form to log visitors arriving at the gate.
          </p>

          <div class="nice-form-group">
            <label>Visitor (Full Name)</label>
            <input name="EditName" type="text" placeholder="Your name" />
          </div>

          <div class="nice-form-group">
            <label>Personnel Class</label>
            <select name="EditPersonnelClass" id="">
              <option value="VISITOR">VISITOR</option>
              <option value="CONTRACTOR">CONTRACTOR</option>
              <option value="VENDOR">VENDOR</option>
              <option value="NPA PERSONNEL">NPA PERSONNEL</option>
            </select> 
          </div>

          <div class="nice-form-group">
            <label>Address</label>
            <small>With additional information below the label</small>
            <input name="EditAddress" type="text" placeholder="Address" />
          </div>

          <div class="nice-form-group">
            <label>Phone Number</label>
            <input name="EditPhoneNumber" type="number" placeholder="@Contact" />
            <small>Or additional information</small>
          </div> 

          <div class="nice-form-group">
            <label>Company visiting</label>
            <input name="EditCompanyVisiting" type="text" placeholder="L.T.T | DEPASA MARINE" />
            <small>Or additional information</small>
          </div> 
        </section>
    
        <section>
          <div class="href-target" id="approval"></div>
          <h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">
              <rect x="2" y="2" width="20" height="8" rx="2" ry="2" />
              <rect x="2" y="14" width="20" height="8" rx="2" ry="2" />
              <line x1="6" y1="6" x2="6.01" y2="6" />
              <line x1="6" y1="18" x2="6.01" y2="18" />
            </svg>
            APPROVAL
          </h1>

          <div class="nice-form-group">
            <label>Security Staff</label>
            <small>With additional information below the label</small>
            <input name="EditSecurityStaff" type="text" placeholder="Security Staff" />
          </div>
          
          <div class="nice-form-group">
            <label>Whom to see</label>
            <small>With additional information below the label</small>
            <input name="EditWhomToSee" type="text" placeholder="Whom to see" />
          </div>

          <div class="nice-form-group">
            <label>Approved by?</label>
            <small>With additional information below the label</small>
            <input name="EditApprovedBy" type="text" placeholder="Approved by" />
          </div>
          
          <div class="nice-form-group">
            <label>Purpose of visiting</label>
            <textarea name="EditPurposeOfVisiting" rows="5" placeholder="Your message"></textarea>
          </div>
          {{-- <div class="nice-form-group">
            <label>Select</label>
            <select>
              <option>Please select a value</option>
              <option>Option 1</option>
              <option>Option 2</option>
            </select>
          </div> --}}

          {{-- <div class="nice-form-group">
            <label>File upload</label>
            <input type="file" />
          </div> --}}
          <details>
            <summary>
              <div class="toggle-code EditEntry"> 
                Update Entry
              </div>
              <span class="d-none"></span>
              <p class="ErrorMessage_Edit text-danger"></p>
            </summary>
          </details>
        </section>  

        <section>
          <div class="href-target" id="input-types"></div>
          <h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
              <line x1="21" y1="10" x2="3" y2="10" />
              <line x1="21" y1="6" x2="3" y2="6" />
              <line x1="21" y1="14" x2="3" y2="14" />
              <line x1="21" y1="18" x2="3" y2="18" />
            </svg>
            ENTRY DETAILS
          </h1>
          <p>All available input types are included</p>
          <div class="nice-form-group">
            <label>Date</label>
            <input name="EditEntryDate" type="date" />
          </div>

          <div class="nice-form-group">
            <label>Time</label>
            <input name="EditEntryTime" type="time" />
          </div>
          
          <div class="nice-form-group">
            <label>TAG NUMBER</label>
            <input name="EditTagNumber" type="number" placeholder="004" />
          </div> 

          <div class="nice-form-group">
            <input name="EditEntrySignature" type="checkbox" class="switch" /> <br><br>
            <span class="d-none"></span>
            <label for="check-3">Signature <br><br>
              <small>You're going into continental shipyard</small>
            </label>
          </div>
        </section>
        
        <section>
          <div class="href-target" id="exit"></div>
          <h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
              <line x1="21" y1="10" x2="3" y2="10" />
              <line x1="21" y1="6" x2="3" y2="6" />
              <line x1="21" y1="14" x2="3" y2="14" />
              <line x1="21" y1="18" x2="3" y2="18" />
            </svg>
            EXIT DETAILS
          </h1>
          <p>All available input types are included</p>
          <div class="nice-form-group">
            <label>Date</label>
            <input name="EditExitDate" type="date" />
          </div>

          <div class="nice-form-group">
            <label>Time</label>
            <input name="EditExitTime" type="time" />
          </div>
          
          <div class="nice-form-group">
            <input name="EditExitSignature" type="checkbox" class="switch" /> <br><br>
            <span class="d-none"></span>
            <label for="check-3">Signature <br><br>
              <small>You're leaving continental shipyard premises</small>
            </label>
          </div>
        </section>  
      </main>
    </div>
  </div>
</form>