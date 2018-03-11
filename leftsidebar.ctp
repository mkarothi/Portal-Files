<?php if(in_array($this->request->params['action'], array("capacitysearch", "storagecalculator") ) ){ ?>
<div id="left_side">
    <h3>Search Reports</h3>
    <div class="gadget">
        <ul class="sb_menu">
            <li>
                <a href="/reports/dc/capacitysearch" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "dc") {?>class = "sidebar-selected" <?php } ?> >Data Center Search</a>
            </li>
            <li>
                <a href="/reports/vendor/capacitysearch" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "vendor") {?>class = "sidebar-selected" <?php } ?> >Vendor Search</a>
            </li>
            <li>
                <a href="/reports/bu/capacitysearch" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "bu") {?>class = "sidebar-selected" <?php } ?> >Business Unit Search</a>
            </li>
            <li>
                <a href="/reports/model/capacitysearch" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "model") {?>class = "sidebar-selected" <?php } ?> >Model Search</a>
            </li>
            <li>
                <a href="/reports/storagecalculator" <?php if(isset($this->request->params['pass']) && empty($this->request->params['pass']) ) {?>class = "sidebar-selected" <?php } ?> >Storage Calculator</a>
            </li>
        </ul>
        <ul class="ns-lookup-link">
            <li></li>
        </ul>
    </div>
</div>
<?php } ?>


<?php if($this->request->params['action'] == "nassearch"){ ?>
<div id="left_side">
    <h3>Search Reports</h3>
    <div class="gadget">
        <ul class="sb_menu">
            <li>
                <a href="/reports/groupshares/nassearch" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "groupshares") {?>class = "sidebar-selected" <?php } ?> >Group Shares Search</a>
            </li>
        </ul>
    </div>
</div>
<?php } ?>

<?php if($this->request->params['action'] == "testddcapacity"){ ?>
<div id="left_side">
	<h3>Menu Items</h3>
	<div class="gadget">
		<h4 class="star"><a href="#" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == 1) {?>class = "sidebar-selected" <?php } ?> >Storage Capacity Reports</a></h4>

		<ul class="sb_menu">
			<li>
				<a href="../SAN/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "SAN") {?>class = "sidebar-selected" <?php } ?> >San Overview</a>
			</li>
			<li>
				<a href="../NAS/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "NAS") {?>class = "sidebar-selected" <?php } ?> >NAS Overview</a>
			</li>
			<li>
				<a href="../ByDC/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "ByDC") {?>class = "sidebar-selected" <?php } ?> >By Datacenters</a>
			</li>
			<li>
				<a href="../3PARSTORAGE/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "3PARSTORAGE") {?>class = "sidebar-selected" <?php } ?> >3PAR Storage</a>
			</li>
			<li>
				<a href="../EMC/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "EMC") {?>class = "sidebar-selected" <?php } ?> >EMC Storage</a>
			</li>
			<ul class="sub_menu">
				<a href="../EMC-DMX/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "EMC-DMX") {?>class = "sidebar-selected" <?php } ?> >EMC-DMX</a>
			</ul>
			<ul class="sub_menu">
				<a href="../EMC-VNX/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "EMC-VNX") {?>class = "sidebar-selected" <?php } ?> >EMC-VNX</a>
			</ul>
			<ul class="sub_menu">
				<a href="../EMC-VMAX/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "EMC-VMAX") {?>class = "sidebar-selected" <?php } ?> >EMC-VMAX</a>
			</ul>
			<ul class="sub_menu">
				<a href="../EMC-Other/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "EMC-Other") {?>class = "sidebar-selected" <?php } ?> >EMC-Other</a>
			</ul>
			<li>
				<a href="../HP/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "HP") {?>class = "sidebar-selected" <?php } ?> >HP Storage</a>
			</li>
			<li>
				<a href="../NetApp/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "NetApp") {?>class = "sidebar-selected" <?php } ?> >NetApp Storage</a>
			</li> 
			<ul class="sub_menu">
				<a href="../NetApp-SAN/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "NetApp-SAN") {?>class = "sidebar-selected" <?php } ?> >NetApp-SAN</a>
			</ul>
			<ul class="sub_menu">
				<a href="../NetApp-NAS/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "NetApp-NAS") {?>class = "sidebar-selected" <?php } ?> >NetApp-NAS</a>
			</ul>
			<li>
				<a href="../IBM/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "IBM") {?>class = "sidebar-selected" <?php } ?> >IBM Storage</a>
			</li>
		</ul>
	</div>
	<h3>Menu Items</h3>
	<div class="gadget">
		<h4 class="star"><a href="../Critical-Frames/capacity">Critical Storage Frames</a></h4>
		<ul class="sb_menu">
			<li>
				<a href="../268-770/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "268-770") {?>class = "sidebar-selected" <?php } ?> >268 & 770 Frames</a>
			</li>
			<li>
				<a href="../622-697/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "622-697") {?>class = "sidebar-selected" <?php } ?> >622 & 697 Frame</a>
			</li>
			<li>
				<a href="../644-726/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "644-726") {?>class = "sidebar-selected" <?php } ?> >644 & 726 Frame</a>
			</li> 
			<ul class="sub_menu">
				<a href="../664/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "664") {?>class = "sidebar-selected" <?php } ?> >664 Frame</a>
			</ul>
			<ul class="sub_menu">
				<a href="../726/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "726") {?>class = "sidebar-selected" <?php } ?> >726 Frame</a>
			</ul>
			<li>
				<a href="../683-700/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "683-700") {?>class = "sidebar-selected" <?php } ?> >683 & 700 Frame</a>
			</li> 
			<ul class="sub_menu">
				<a href="../683/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "683") {?>class = "sidebar-selected" <?php } ?> >683 Frame</a>
			</ul>
			<ul class="sub_menu">
				<a href="../700/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "700") {?>class = "sidebar-selected" <?php } ?> >700 Frame</a>
			</ul>
			<li>
				<a href="../701-709/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "701-709") {?>class = "sidebar-selected" <?php } ?> >701 & 709 Frame</a>
			</li> 
			<ul class="sub_menu">
				<a href="../701/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "701") {?>class = "sidebar-selected" <?php } ?> >701 Frame</a>
			</ul>
			<ul class="sub_menu">
				<a href="../709/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "709") {?>class = "sidebar-selected" <?php } ?> >709 Frame</a>
			</ul>
			<li>
				<a href="../819-820/capacity" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "819-820") {?>class = "sidebar-selected" <?php } ?> >819 & 820 Frame</a>
			</li>
		</ul>
	</div>
</div>
<?php } ?>

<?php if(in_array($this->request->params['action'], array('serverinventory',"pingnslookup") ) ){?>
<div id="left_side">
    <h3>Search Reports</h3>
    <div class="gadget">
        <ul class="sb_menu">
            <li>
                <a href="/reports/global/serverinventory" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "global") {?>class = "sidebar-selected" <?php } ?> >Global Server Search</a>
            </li>
            <li>
                <a href="/reports/CMDB/serverinventory" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "CMDB") {?>class = "sidebar-selected" <?php } ?> >CMDB Server Search</a>
            </li>
            <li>
                <a href="/reports/RVTools/serverinventory" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "RVTools") {?>class = "sidebar-selected" <?php } ?> >RVTools Server Search</a>
            </li>

            <li>
                <a href="/reports/pingnslookup/" <?php if(isset($this->request->action) && $this->request->action == "pingnslookup") {?>class = "sidebar-selected" <?php } ?> >DNS Lookup & Ping Check</a>
            </li>
            <!-- NSLookup & Ping Check D:\Automation-Scripts\NslookupAndPing\PingCheck_DNSLookup.pl  -->           
        </ul>
        <ul class="ns-lookup-link">
            <li></li>
        </ul>
    </div>
</div>
<?php } ?>

<?php if($this->request->params['action'] == 'storagebilling'){?>
<div id="left_side">
    <h3>Search Reports</h3>
    <div class="gadget">
        <ul class="sb_menu">
            <li>
                <a href="/reports/global/storagebilling" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "global") {?>class = "sidebar-selected" <?php } ?> >Global Billing Search</a>
            </li>
            <li>
                <a href="/reports/sanstorage/storagebilling" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "sanstorage") {?>class = "sidebar-selected" <?php } ?> >SAN Storage Billing Search</a>
            </li>
            <li>
                <a href="/reports/backupstorage/storagebilling" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "backupstorage") {?>class = "sidebar-selected" <?php } ?> >Backup Storage Billing Search</a>
            </li>
            <li>
                <a href="/reports/nasusers/storagebilling" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "nasusers") {?>class = "sidebar-selected" <?php } ?> >NAS Users Billing Search</a>
            </li>
            <li>
                <a href="/reports/nasgroups/storagebilling" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "nasgroups") {?>class = "sidebar-selected" <?php } ?> >NAS Groups Billing Search</a>
            </li>              
        </ul>
    </div>
</div>
<?php } ?>

<?php if($this->request->params['action'] == 'cmdbinventory'){ ?>
<div id="left_side">
    <h3>Search Reports</h3>
    <div class="gadget">
        <ul class="sb_menu">
            <li>
                <a href="/reports/global/cmdbinventory" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "global") {?>class = "sidebar-selected" <?php } ?> >Global Billing Search</a>
            </li>
            <li>
                <a href="/reports/CMDB/cmdbinventory" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "CMDB") {?>class = "sidebar-selected" <?php } ?> >CMDB Server Search</a>
            </li>
        </ul>
    </div>
</div>
<?php } ?>

<?php if($this->request->params['action'] == 'drexercise'){ ?>
<div id="left_side">
    <h3>Search Reports</h3>
    <div class="gadget">
        <ul class="sb_menu">
            <li>
                <a href="/reports/global/drexercise" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "global") {?>class = "sidebar-selected" <?php } ?> >Global Billing Search</a>
            </li>
            <li>
                <a href="/reports/DR/drexercise" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "DR") {?>class = "sidebar-selected" <?php } ?> >DR Exercise Search</a>
            </li>
        </ul>
    </div>
</div>
<?php } ?>

<?php if($this->request->params['action'] == 'tqhealth'){?>
<div id="left_side">
    <h3>Search Reports</h3>
    <div class="gadget">
        <ul class="sb_menu">
            <li>
                <a href="/reports/global/tqhealth" <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "global") {?>class = "sidebar-selected" <?php } ?> >Global TQ Health Search</a>
            </li>
			<li>
                <a href="/reports/pingnslookup/" <?php if(isset($this->request->action) && $this->request->action == "pingnslookup") {?>class = "sidebar-selected" <?php } ?> >DNS Lookup & Ping Check</a>
            </li>
        </ul>
    </div>
</div>
<?php } ?>