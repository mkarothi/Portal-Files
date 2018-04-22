<div id="header_wrapper">
    <div id="header">
      <table> <tr><td>
      <a href="/reports/capacitysearch/"><span class="logo-title"><img src="/images/star.png" alt=""/></a>
      </td><td></td>
      <td>
      <h1> <font color="#CC0033">P</font>erformance <font color="#CC0033">E</font>xcellence <font color="#CC0033">T</font>racking  <font color="#CC0033">S</font>ystem</h1>
      </td>
      </tr>
      </table>
    </div>
    <?php // debug($this->request->params['action']);?>
    <div id="navcontainer">
      <ul id="navlist">
		<li <?php if($this->request->params['action'] == 'tqhealth'){?>class="active" <?php }?> ><a href="/reports/global/tqhealth/" <?php if($this->request->params['action'] == 'tqhealth'){?>class="current" <?php }?>>TQ Check</a></li>
		
        <li <?php if(in_array($this->request->params['action'],array('pingnslookup', 'serverinventory')) ){?>class="active" <?php }?> ><a href="/reports/tadam/serverinventory" <?php if(in_array($this->request->params['action'],array('pingnslookup', 'serverinventory'))){?>class="current" <?php }?>>Server Inventory</a></li>
		
        <li <?php if(in_array($this->request->params['action'],array('cmdbinventory')) ){?>class="active" <?php }?> ><a href="/reports/global/cmdbinventory" <?php if(in_array($this->request->params['action'],array('cmdbinventory'))){?>class="current" <?php }?>>CMDB Inventory</a></li>
        
        <li <?php if(in_array($this->request->params['action'],array('paritycheck')) ){?>class="active" <?php }?> ><a href="/reports/global/paritycheck" <?php if(in_array($this->request->params['action'],array('paritycheck'))){?>class="current" <?php }?>>Parity Check</a></li>
      </ul>
    </div>
</div>
