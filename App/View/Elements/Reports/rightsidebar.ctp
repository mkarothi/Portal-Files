<?php if(in_array($this->request->params['action'],array('serverinventory','pingnslookup') )){?>
<div id="right_side">
    <div id='cssmenu' class="sb_menu">
    <ul>
       <li class='has-sub'><a href='#'><span>Export Reports</span></a>
          <ul>
            <li>
                <a href="/reports/cmdb/exportsheet/">CMDB Server Data File</a>
            </li>
            <li>
                <a href="/reports/rvtools/exportsheet">RVTools ServerData File</a>
            </li>
            <li class='last'>
                <a href="/reports/hmcscans/exportsheet">HMCScans Server Data File</a>
            </li>            
        </ul>
        </li>
        </ul>
    </div>
</div>
<?php } ?>
<?php if(in_array($this->request->params['action'],array('nassearch') )){?>
<div id="right_side">
    <div id='cssmenu' class="sb_menu">
    <ul>
       <li class='has-sub'><a href='#'><span>Export Reports</span></a>
          <ul>
            <li>
                <a href="/reports/nasgroupshare/exportsheet">NAS Group Shares Data File</a>
            </li>            
        </ul>
        </li>
        </ul>
    </div>
</div>
<?php } ?>
<?php if($this->request->params['action'] == 'storagebilling'){?>
    
<div id="right_side" class="sb_menu">
    <div id='cssmenu' class="sb_menu">
    <ul>
       <li class='has-sub'><a href='#'><span>Export Reports</span></a>
          <ul>
            <li>
                <a href="/reports/sanstorage/exportsheet/">SAN Storage Billing File</a>
            </li>
            <li>
                <a href="/reports/backupstorage/exportsheet">Backup Storage Billing File</a>
            </li>
            <li>
                <a href="/reports/nasusers/exportsheet">NAS Users Billing File</a>
            </li>
            <li class='last'>
                <a href="/reports/nasgroups/exportsheet">NAS Groups Billing File</a>
            </li>            
        </ul>
      </li>
      </ul>
    </div>
</div>
<?php } ?> 


<?php if($this->request->params['action'] == 'sanstorage'){?>
    
<div id="right_side">
    <div id='cssmenu' class="sb_menu">
    <ul>
       <li class='has-sub'><a href='#'><span>Export Reports</span></a>
          <ul>
            <li>
                <a href="/reports/storagehosts/exportsheet">Server Storage File</a>
            </li>
            <li>
                <a href="/reports/symdevice/exportsheet">Sym Device File</a>
            </li>
            <li>
                <a href="/reports/symconfig/exportsheet"><span>Sym Config File</span></a>
            </li>
            <li>
                <a href="/reports/symrdf/exportsheet"><span>Sym RDF File</span></a>
            </li>
            <li>
                <a href="/reports/symclone/exportsheet"><span>Sym Clone File</span></a>
            </li>
            <li>
                <a href="/reports/symbcv/exportsheet"><span>Sym BCV File</span></a>
            </li>
            <li>
                <a href="/reports/wwninitiator/exportsheet"><span>WWN-Initiator File</span></a>
            </li>
            <!-- <li>
                <a href="/reports/symlogin/exportsheet"><span>Sym Login File</span></a>
            </li>
            <li class='last'>
                <a href="/reports/storagegroup/exportsheet"><span>Storage Group File</span></a>
            </li> --> 
          </ul>
       </li>
    </ul>
    </div>
</div>
<?php } ?> 
