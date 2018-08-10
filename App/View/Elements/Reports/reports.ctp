<?php if($reportName == 1){ ?>
    <table xmlns:rsext="xalan://com.cognos.reportserver.ext.RSExt" cellpadding="0" cellspacing="0" border="0" class="pg" LID="Page1">
    <tr class="tableRow">
        <td style="padding-bottom:10px;" class="ph">
        <div class="ta">
            <span tabIndex="0" class="tt"><?php echo $reportTitle; ?></span>
        </div></td>
    </tr>
    <tr class="tableRow">
        <td class="pb">
        <table style="border-collapse:collapse;width:100%;text-align:center;" class="tb" cellpadding="0">
            <tr class="tableRow">
                <td class="tableCell">
                <map class="chart_map" LID="rsvptt0" name="rsvptt0">
                    <area class="chart_area" type="legendLabel" shape="POLY" coords="362, -3, 477, -3, 477, 11, 362, 11" title="Allocated_Capacity(TB)" tabIndex="-1">
                    <area class="chart_area" type="legendLabel" shape="POLY" coords="362, 12, 481, 12, 481, 25, 362, 25" title="Used_Capacity(TB)" tabIndex="-1">
                    <area class="chart_area" type="legendLabel" shape="POLY" coords="362, 26, 481, 26, 481, 39, 362, 39" title="Available_Capacity(TB)" tabIndex="-1">
                    <area class="chart_area" type="ordinalAxisTitle" shape="POLY" coords="110, 336, 227, 336, 227, 349, 110, 349" title="STORAGE OVERVIEW" tabIndex="-1">
                    <area class="chart_area" type="ordinalAxisLabel" shape="POLY" coords="11, 213, 163, 213, 163, 349, 11, 349" title="System = NAS" tabIndex="-1">
                    <area class="chart_area" type="ordinalAxisLabel" shape="POLY" coords="175, 212, 326, 212, 326, 349, 175, 349" title="System = SAN" tabIndex="-1">
                    <area class="chart_area" type="chartElement" shape="POLY" coords="250, 154, 306, 154, 305, 148, 305, 143, 303, 138, 302, 133, 300, 128, 297, 124, 294, 120, 291, 116, 287, 112, 283, 109, 279, 106, 274, 103" title="System = SAN &#10;Available_Capacity(TB) = 6,129.84" tabIndex="-1">
                    <area class="chart_area" type="chartElement" shape="POLY" coords="250, 154, 274, 103, 270, 101, 265, 100, 260, 99, 255, 98, 250, 98, 245, 98, 240, 98, 236, 99, 231, 101, 226, 103, 222, 105, 218, 107, 214, 110, 210, 114, 207, 117, 204, 121, 201, 125, 199, 130, 197, 134, 195, 139, 194, 144, 194, 149, 194, 153" title="System = SAN &#10;Used_Capacity(TB) = 11,118.87" tabIndex="-1">
                    <area class="chart_area" type="chartElement" shape="POLY" coords="250, 154, 194, 154, 194, 158, 194, 163, 195, 168, 197, 173, 199, 177, 201, 181, 204, 186, 207, 189, 210, 193, 214, 196, 217, 199, 221, 202, 226, 204, 230, 206, 235, 208, 240, 209, 245, 209, 249, 210, 254, 209, 259, 209, 264, 208, 269, 206, 273, 204, 277, 202, 282, 199, 285, 196, 289, 193, 292, 189, 295, 186, 298, 182, 300, 177, 302, 173, 304, 168, 305, 163, 305, 158, 306, 154" title="System = SAN &#10;Allocated_Capacity(TB) = 17,248.71" tabIndex="-1">
                    <area class="chart_area" type="chartElement" shape="POLY" coords="86, 154, 142, 154, 141, 149, 141, 144, 140, 139, 138, 134, 136, 129, 134, 125, 131, 121, 128, 117, 125, 113" title="System = NAS &#10;Available_Capacity(TB) = 768.43" tabIndex="-1">
                    <area class="chart_area" type="chartElement" shape="POLY" coords="86, 154, 125, 113, 121, 110, 118, 107, 114, 104, 109, 102, 105, 100, 100, 98, 95, 97, 90, 97, 86, 97, 81, 97, 76, 97, 71, 98, 66, 100, 62, 102, 58, 104, 53, 107, 50, 110, 46, 113, 43, 117, 40, 121, 37, 125, 35, 129, 33, 134, 31, 139, 30, 144, 30, 149, 30, 153" title="System = NAS &#10;Used_Capacity(TB) = 2,279.06" tabIndex="-1">
                    <area class="chart_area" type="chartElement" shape="POLY" coords="86, 154, 30, 154, 30, 158, 30, 163, 31, 168, 33, 173, 35, 178, 37, 182, 40, 186, 43, 190, 46, 194, 50, 197, 53, 200, 57, 203, 62, 205, 66, 207, 71, 209, 76, 210, 81, 210, 85, 211, 90, 210, 95, 210, 100, 209, 105, 207, 109, 205, 113, 203, 118, 200, 121, 197, 125, 194, 128, 190, 131, 186, 134, 182, 136, 178, 138, 173, 140, 168, 141, 163, 141, 158, 142, 154" title="System = NAS &#10;Allocated_Capacity(TB) = 3,047.49" tabIndex="-1">
                </map><span tabIndex="0"><img name="chartN0CB86200.0B59A820" style="padding-left: 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;" class="ch" LID="Pie Chart1" src="/images/reports/<?php echo $reportName; ?>.png" width="500" height="350" usemap="#rsvptt0" border="0"></span></td>
            </tr>
            <tr class="tableRow">
                <td class="tableCell">
                <table style="border:1pt solid #9999CC;border-collapse:collapse;" class="ls" LID="List1" cellpadding="0">
                    <tr>
                        <td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC;text-align:center" class="lt"><span tabIndex="0" class="textItem">System</span></td><td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC" class="lt"><span tabIndex="-1" class="textItem">Physical_Capacity(TB)</span></td><td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC" class="lt"><span tabIndex="-1" class="textItem">Allocated_Capacity(TB)</span></td><td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC" class="lt"><span tabIndex="-1" class="textItem">Used_Capacity(TB)</span></td><td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC" class="lt"><span tabIndex="-1" class="textItem">Available_Capacity(TB)</span></td>
                    </tr>
                    <tr>
                        <td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">NAS</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">6,308.08</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">3,047.49</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">2,279.06</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">768.43</span></td>
                    </tr>
                    <tr>
                        <td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">SAN</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">26,092.44</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">17,248.71</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">11,118.87</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">6,129.84</span></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
    <tr class="tableRow">
        <td style="padding-top:10px;" class="pf"></td>
    </tr>
</table>
<?php } ?>
<?php if($reportName == "SAN"){ ?>
    <table xmlns:rsext="xalan://com.cognos.reportserver.ext.RSExt" cellpadding="0" cellspacing="0" border="0" class="pg" LID="Page1">
	<tr class="tableRow">
		<td style="padding-bottom:10px;" class="ph">
		<div class="ta">
			<span tabIndex="0" class="tt">SAN - High Level Capacity Report</span>
		</div></td>
	</tr>
	<tr class="tableRow">
		<td class="pb">
		<table style="border-collapse:collapse;width:100%;" class="tb" cellpadding="0">
			<tr class="tableRow">
				<td class="tableCell">
				<map class="chart_map" LID="rsvptt0" name="rsvptt0">
					<area class="chart_area" type="legendLabel" shape="POLY" coords="255, -3, 357, -3, 357, 11, 255, 11" title="Allocated_Capacity(TB)" tabIndex="-1">
					<area class="chart_area" type="legendLabel" shape="POLY" coords="255, 12, 360, 12, 360, 25, 255, 25" title="Used_Capacity(TB)" tabIndex="-1">
					<area class="chart_area" type="legendLabel" shape="POLY" coords="255, 26, 360, 26, 360, 39, 255, 39" title="Available_Capacity(TB)" tabIndex="-1">
					<area class="chart_area" type="ordinalAxisTitle" shape="POLY" coords="95, 364, 134, 364, 134, 377, 95, 377" title="System" tabIndex="-1">
					<area class="chart_area" type="ordinalAxisLabel" shape="POLY" coords="11, 285, 214, 285, 214, 377, 11, 377" title="System = SAN" tabIndex="-1">
					<area class="chart_area" type="chartElement" shape="POLY" coords="112, 178, 216, 178, 215, 168, 214, 158, 211, 149, 208, 140, 204, 131, 200, 122, 194, 114, 188, 107, 181, 100, 174, 94, 166, 89, 157, 84" title="System = SAN &#10;Available_Capacity(TB) = 6,129.84" tabIndex="-1">
					<area class="chart_area" type="chartElement" shape="POLY" coords="112, 178, 157, 84, 149, 80, 140, 77, 131, 75, 122, 74, 113, 74, 104, 74, 95, 75, 86, 77, 77, 79, 68, 83, 60, 87, 53, 92, 45, 97, 38, 103, 32, 110, 27, 117, 22, 125, 17, 133, 14, 142, 11, 150, 9, 159, 8, 168, 8, 177" title="System = SAN &#10;Used_Capacity(TB) = 11,118.87" tabIndex="-1">
					<area class="chart_area" type="chartElement" shape="POLY" coords="112, 178, 8, 178, 8, 187, 9, 196, 11, 204, 14, 213, 17, 221, 21, 229, 26, 237, 32, 244, 38, 251, 45, 257, 52, 263, 59, 268, 68, 272, 76, 275, 85, 278, 93, 280, 102, 281, 111, 282, 121, 281, 130, 280, 138, 278, 147, 275, 155, 272, 163, 268, 171, 263, 178, 257, 185, 251, 191, 244, 197, 237, 202, 230, 206, 221, 209, 213, 212, 204, 214, 196, 215, 187, 216, 178" title="System = SAN &#10;Allocated_Capacity(TB) = 17,248.71" tabIndex="-1">
				</map><span tabIndex="0"><img name="chartN0CB87540.0E6E5D70" style="width:10cm;height:10cm;padding-left: 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;" class="ch" LID="Pie Chart1" src="/images/reports/<?php echo $reportName; ?>.png" width="378" height="378" usemap="#rsvptt0" border="0"></span></td>
			</tr>
			<tr class="tableRow">
				<td class="tableCell"></td>
			</tr>
			<tr class="tableRow">
				<td class="tableCell"></td>
			</tr>
		</table>
		<table style="border-collapse:collapse;" class="ls" LID="List1" cellpadding="0" border="1">
			<tr>
				<td class="lt"><span tabIndex="0" class="textItem">System</span></td><td class="lt"><span tabIndex="-1" class="textItem">Allocated_Capacity(TB)</span></td><td class="lt"><span tabIndex="-1" class="textItem">Used_Capacity(TB)</span></td><td class="lt"><span tabIndex="-1" class="textItem">Available_Capacity(TB)</span></td>
			</tr>
			<tr>
				<td class="lm"><span tabIndex="-1" class="textItem">SAN</span></td><td class="lm"><span tabIndex="-1" class="textItem">17,248.71</span></td><td class="lm"><span tabIndex="-1" class="textItem">11,118.87</span></td><td class="lm"><span tabIndex="-1" class="textItem">6,129.84</span></td>
			</tr>
		</table></td>
	</tr>
	<tr class="tableRow">
		<td style="padding-top:10px;" class="pf"></td>
	</tr>
</table>
<?php } ?>
<?php if($reportName == "NAS"){ ?>
    <table xmlns:rsext="xalan://com.cognos.reportserver.ext.RSExt" cellpadding="0" cellspacing="0" border="0" class="pg" LID="Page1">
	<tr class="tableRow">
		<td style="padding-bottom:10px;" class="ph">
		<div class="ta">
			<span tabIndex="0" class="tt">NAS- High Level Capacity Report</span>
		</div></td>
	</tr>
	<tr class="tableRow">
		<td class="pb">
		<table style="border-collapse:collapse;width:100%;" class="tb" cellpadding="0">
			<tr class="tableRow">
				<td class="tableCell">
				<map class="chart_map" LID="rsvptt0" name="rsvptt0">
					<area class="chart_area" type="legendLabel" shape="POLY" coords="255, -3, 357, -3, 357, 11, 255, 11" title="Allocated_Capacity(TB)" tabIndex="-1">
					<area class="chart_area" type="legendLabel" shape="POLY" coords="255, 12, 360, 12, 360, 25, 255, 25" title="Used_Capacity(TB)" tabIndex="-1">
					<area class="chart_area" type="legendLabel" shape="POLY" coords="255, 26, 360, 26, 360, 39, 255, 39" title="Available_Capacity(TB)" tabIndex="-1">
					<area class="chart_area" type="ordinalAxisTitle" shape="POLY" coords="103, 364, 126, 364, 126, 377, 103, 377" title="NAS" tabIndex="-1">
					<area class="chart_area" type="ordinalAxisLabel" shape="POLY" coords="11, 285, 214, 285, 214, 377, 11, 377" title="System = NAS" tabIndex="-1">
					<area class="chart_area" type="chartElement" shape="POLY" coords="112, 178, 216, 178, 215, 168, 214, 159, 212, 151, 209, 142, 206, 134, 202, 126, 197, 118, 191, 111, 185, 104" title="System = NAS &#10;Available_Capacity(TB) = 768.43" tabIndex="-1">
					<area class="chart_area" type="chartElement" shape="POLY" coords="112, 178, 185, 104, 178, 98, 171, 92, 164, 87, 155, 83, 147, 80, 138, 77, 130, 75, 121, 74, 112, 74, 102, 74, 93, 75, 85, 77, 76, 80, 68, 83, 60, 87, 52, 92, 45, 98, 38, 104, 32, 111, 26, 118, 21, 125, 17, 134, 14, 142, 11, 151, 9, 159, 8, 168, 8, 177" title="System = NAS &#10;Used_Capacity(TB) = 2,279.06" tabIndex="-1">
					<area class="chart_area" type="chartElement" shape="POLY" coords="112, 178, 8, 178, 8, 187, 9, 196, 11, 204, 14, 213, 17, 221, 21, 229, 26, 237, 32, 244, 38, 251, 45, 257, 52, 263, 59, 268, 68, 272, 76, 275, 85, 278, 93, 280, 102, 281, 111, 282, 121, 281, 130, 280, 138, 278, 147, 275, 155, 272, 163, 268, 171, 263, 178, 257, 185, 251, 191, 244, 197, 237, 202, 230, 206, 221, 209, 213, 212, 204, 214, 196, 215, 187, 216, 178" title="System = NAS &#10;Allocated_Capacity(TB) = 3,047.49" tabIndex="-1">
				</map><span tabIndex="0"><img name="chartN0837B2C0.082FA770" style="width:10cm;height:10cm;padding-left: 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;" class="ch" LID="Pie Chart1" src="/images/reports/<?php echo $reportName; ?>.png" width="378" height="378" usemap="#rsvptt0" border="0"></span></td>
			</tr>
			<tr class="tableRow">
				<td class="tableCell"></td>
			</tr>
			<tr class="tableRow">
				<td class="tableCell"></td>
			</tr>
		</table>
		<table style="border-collapse:collapse;" class="ls" LID="List1" cellpadding="0">
			<tr>
				<td class="lt"><span tabIndex="0" class="textItem">System</span></td><td class="lt"><span tabIndex="-1" class="textItem">Allocated_Capacity(TB)</span></td><td class="lt"><span tabIndex="-1" class="textItem">Used_Capacity(TB)</span></td><td class="lt"><span tabIndex="-1" class="textItem">Available_Capacity(TB)</span></td>
			</tr>
			<tr>
				<td class="lm"><span tabIndex="-1" class="textItem">NAS</span></td><td class="lm"><span tabIndex="-1" class="textItem">3,047.49</span></td><td class="lm"><span tabIndex="-1" class="textItem">2,279.06</span></td><td class="lm"><span tabIndex="-1" class="textItem">768.43</span></td>
			</tr>
		</table></td>
	</tr>
	<tr class="tableRow">
		<td style="padding-top:10px;" class="pf"></td>
	</tr>
</table>
    
<?php } ?>
<?php if($reportName == "ByDC"){ ?>
    <table xmlns:rsext="xalan://com.cognos.reportserver.ext.RSExt" cellpadding="0" cellspacing="0" border="0" class="pg" LID="Page1">
	<tr class="tableRow">
		<td style="padding-bottom:10px;" class="ph">
		<div class="ta">
			<span tabIndex="0" class="tt">Storage Distribution Among Manufacturers&nbsp;</span>
		</div></td>
	</tr>
	<tr class="tableRow">
		<td class="pb">
		<table style="border:1pt solid #9999CC;border-collapse:collapse;" class="ls" LID="List3" cellpadding="0">
			<tr>
				<td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC;width:100px" class="lt"><span tabIndex="0" class="textItem">Data Center</span></td><td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC;width:200px" class="lt"><span tabIndex="-1" class="textItem">HP Storage Physcial Capacity (TB)</span></td><td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC;width:200px" class="lt"><span tabIndex="-1" class="textItem">HP Storage Used Capacity (TB)</span></td><td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC;width:200px" class="lt"><span tabIndex="-1" class="textItem">HP Storage Available Capacity (TB)</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AM1</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AM1 - OGDC</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AM2</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AM2 - OGDC</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AP1</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AP2</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">EM1</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">EM2</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">FE1</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">FE2</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">In Country</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">Other</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">126.91</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">126.91</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">Total</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">126.91</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">126.91</span></td><td style="font-size:7.500000pt;color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
		</table>
		<table style="border-collapse:collapse;" class="ls" LID="List1" cellpadding="0">
			<tr>
				<td style="width:100px" class="lt"><span tabIndex="0" class="textItem">Data Center</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">EMC Storage Physcial Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">EMC Storage Used Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">EMC Storage Available Capacity (TB)</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">4,719.78</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">2,849.09</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">1,870.69</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM1 - OGDC</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">194.02</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">155.71</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">38.31</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">4,273.83</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">2,705.45</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">1,568.38</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM2 - OGDC</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">478.56</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">355.63</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">122.93</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AP1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">1,289.62</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">1,089.06</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">200.55</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AP2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">294.45</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">231.88</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">62.57</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">EM1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">531.15</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">432.86</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">98.3</span></td>
			</tr>
		</table></td>
	</tr>
	<tr class="tableRow">
		<td style="padding-top:10px;" class="pf"></td>
	</tr>
</table>
<table xmlns:rsext="xalan://com.cognos.reportserver.ext.RSExt" cellpadding="0" cellspacing="0" border="0" class="pg" LID="Page1">
	<tr class="tableRow">
		<td style="padding-bottom:10px;" class="ph">
		<div class="ta">
			<span tabIndex="0" class="tt">Storage Distribution Among Manufacturers&nbsp;</span>
		</div></td>
	</tr>
	<tr class="tableRow">
		<td class="pb">
		<table style="border-collapse:collapse;" class="ls" LID="List1" cellpadding="0">
			<tr>
				<td style="width:100px" class="lt"><span tabIndex="0" class="textItem">Data Center</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">EMC Storage Physcial Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">EMC Storage Used Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">EMC Storage Available Capacity (TB)</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">EM2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">600.71</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">478.65</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">122.06</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">FE1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">428.38</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">207.89</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">220.49</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">FE2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">280.03</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">176.97</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">103.06</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">In Country</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">193.51</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">96.17</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">97.34</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">Other</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">201.31</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">83.86</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">117.45</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">Total</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">13,485.33</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">8,863.22</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">4,622.11</span></td>
			</tr>
		</table>
		<table style="border-collapse:collapse;" class="ls" LID="List2" cellpadding="0">
			<tr>
				<td style="width:100px" class="lt"><span tabIndex="0" class="textItem">Data Center</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">3PAR Storage Physcial Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">3PAR Storage Used Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">3PAR Storage Available Capacity (TB)</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM1 - OGDC</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">76.94</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">74.99</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">1.95</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM2 - OGDC</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">188.13</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">166.86</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">21.27</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AP1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AP2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">EM1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">EM2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">FE1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">FE2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">In Country</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">Other</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">48.61</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">48.36</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0.25</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">Total</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">313.67</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">290.2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">23.47</span></td>
			</tr>
		</table>
		<table style="border-collapse:collapse;" class="ls" LID="List4" cellpadding="0">
			<tr>
				<td style="width:100px" class="lt"><span tabIndex="0" class="textItem">Data Center</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">IBM Storage Physcial Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">IBM Storage Used Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">IBM Storage Available Capacity (TB)</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">146.66</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">73.36</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">73.31</span></td>
			</tr>
		</table></td>
	</tr>
	<tr class="tableRow">
		<td style="padding-top:10px;" class="pf"></td>
	</tr>
</table>
<table xmlns:rsext="xalan://com.cognos.reportserver.ext.RSExt" cellpadding="0" cellspacing="0" border="0" class="pg" LID="Page1">
	<tr class="tableRow">
		<td style="padding-bottom:10px;" class="ph">
		<div class="ta">
			<span tabIndex="0" class="tt">Storage Distribution Among Manufacturers&nbsp;</span>
		</div></td>
	</tr>
	<tr class="tableRow">
		<td class="pb">
		<table style="border-collapse:collapse;" class="ls" LID="List4" cellpadding="0">
			<tr>
				<td style="width:100px" class="lt"><span tabIndex="0" class="textItem">Data Center</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">IBM Storage Physcial Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">IBM Storage Used Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">IBM Storage Available Capacity (TB)</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM1 - OGDC</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">30.38</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">1.02</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">29.36</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM2 - OGDC</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AP1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AP2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">EM1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">EM2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">FE1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">FE2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">In Country</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">Other</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">Total</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">177.04</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">74.37</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">102.67</span></td>
			</tr>
		</table>
		<table style="border-collapse:collapse;" class="ls" LID="List5" cellpadding="0">
			<tr>
				<td style="width:100px" class="lt"><span tabIndex="0" class="textItem">Data Center</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">NetApp Storage Physcial Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">NetApp Storage Used Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">NetApp Storage Available Capacity (TB)</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">1,454.41</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">886.43</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">567.98</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM1 - OGDC</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">180.45</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">157.18</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">23.27</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">1,285.11</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">885.71</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">399.4</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AM2 - OGDC</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">421.47</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">321.46</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">100.01</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AP1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">AP2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">EM1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">104.78</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">73.6</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">31.18</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">EM2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">104.78</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">79.93</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">24.84</span></td>
			</tr>
		</table></td>
	</tr>
	<tr class="tableRow">
		<td style="padding-top:10px;" class="pf"></td>
	</tr>
</table>
<table xmlns:rsext="xalan://com.cognos.reportserver.ext.RSExt" cellpadding="0" cellspacing="0" border="0" class="pg" LID="Page1">
	<tr class="tableRow">
		<td style="padding-bottom:10px;" class="ph">
		<div class="ta">
			<span tabIndex="0" class="tt">Storage Distribution Among Manufacturers&nbsp;</span>
		</div></td>
	</tr>
	<tr class="tableRow">
		<td class="pb">
		<table style="border-collapse:collapse;" class="ls" LID="List5" cellpadding="0">
			<tr>
				<td style="width:100px" class="lt"><span tabIndex="0" class="textItem">Data Center</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">NetApp Storage Physcial Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">NetApp Storage Used Capacity (TB)</span></td><td style="width:200px" class="lt"><span tabIndex="-1" class="textItem">NetApp Storage Available Capacity (TB)</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">FE1</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">373.65</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">232.82</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">140.83</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">FE2</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">373.65</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">229.36</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">144.29</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">In Country</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">Other</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">534.77</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">356.9</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">177.87</span></td>
			</tr>
			<tr>
				<td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">Total</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">4,833.06</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">3,223.38</span></td><td style="font-size:7.500000pt" class="lm"><span tabIndex="-1" class="textItem">1,609.68</span></td>
			</tr>
		</table></td>
	</tr>
	<tr class="tableRow">
		<td style="padding-top:10px;" class="pf"></td>
	</tr>
</table>
<?php } ?>
<?php if($reportName == "3PAR"){ ?>
    <table xmlns:rsext="xalan://com.cognos.reportserver.ext.RSExt" cellpadding="0" cellspacing="0" border="0" class="pg" LID="Page1">
	<tr class="tableRow">
		<td style="padding-bottom:10px;" class="ph">
		<div class="ta">
			<span tabIndex="0" class="tt">3 PAR STORAGE ALLOCATION</span>
		</div></td>
	</tr>
	<tr class="tableRow">
		<td class="pb">
		<map class="chart_map" LID="rsvptt0" name="rsvptt0">
			<area class="chart_area" type="legendTitle" shape="POLY" coords="395, 6, 487, 6, 487, 22, 395, 22" title="Data Center" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 23, 481, 23, 481, 35, 412, 35" title="Data Center = AM1" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 36, 481, 36, 481, 48, 412, 48" title="Data Center = AM1 - OGDC" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 49, 481, 49, 481, 61, 412, 61" title="Data Center = AM2" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 62, 481, 62, 481, 74, 412, 74" title="Data Center = AM2 - OGDC" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 75, 481, 75, 481, 87, 412, 87" title="Data Center = AP1" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 88, 481, 88, 481, 100, 412, 100" title="Data Center = AP2" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 101, 481, 101, 481, 113, 412, 113" title="Data Center = EM1" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 114, 481, 114, 481, 126, 412, 126" title="Data Center = EM2" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 127, 481, 127, 481, 139, 412, 139" title="Data Center = FE1" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 140, 481, 140, 481, 152, 412, 152" title="Data Center = FE2" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 153, 481, 153, 481, 165, 412, 165" title="Data Center = In Country" tabIndex="-1">
			<area class="chart_area" type="legendLabel" shape="POLY" coords="412, 166, 481, 166, 481, 178, 412, 178" title="Data Center = Other" tabIndex="-1">
			<area class="chart_area" type="numericAxisTitle" shape="POLY" coords="9, 196, 9, 117, 22, 117, 22, 196" title="CAPACITY (TB)" tabIndex="-1">
			<area class="chart_area" type="ordinalAxisLabel" shape="POLY" coords="14, 304, 197, 304, 197, 317, 14, 317" title="3PAR Storage Physcial Capacity (TB)" tabIndex="-1">
			<area class="chart_area" type="ordinalAxisLabel" shape="POLY" coords="133, 318, 299, 318, 299, 331, 133, 331" title="3PAR Storage Used Capacity (TB)" tabIndex="-1">
			<area class="chart_area" type="ordinalAxisLabel" shape="POLY" coords="233, 304, 419, 304, 419, 317, 233, 317" title="3PAR Storage Available Capacity (TB)" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 281, 289, 281, 363, 281, 363, 281" title="Data Center = Other &#10;3PAR Storage Available Capacity (TB) = 0.23" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 100, 179, 61, 253, 61, 253, 100" title="Data Center = Other &#10;3PAR Storage Used Capacity (TB) = 48.41" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 81, 68, 41, 142, 41, 142, 81" title="Data Center = Other &#10;3PAR Storage Physcial Capacity (TB) = 48.64" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 281, 289, 281, 363, 281, 363, 281" title="Data Center = In Country &#10;3PAR Storage Available Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 100, 179, 100, 253, 100, 253, 100" title="Data Center = In Country &#10;3PAR Storage Used Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 81, 68, 81, 142, 81, 142, 81" title="Data Center = In Country &#10;3PAR Storage Physcial Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 281, 289, 281, 363, 281, 363, 281" title="Data Center = FE2 &#10;3PAR Storage Available Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 100, 179, 100, 253, 100, 253, 100" title="Data Center = FE2 &#10;3PAR Storage Used Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 81, 68, 81, 142, 81, 142, 81" title="Data Center = FE2 &#10;3PAR Storage Physcial Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 281, 289, 281, 363, 281, 363, 281" title="Data Center = FE1 &#10;3PAR Storage Available Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 100, 179, 100, 253, 100, 253, 100" title="Data Center = FE1 &#10;3PAR Storage Used Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 81, 68, 81, 142, 81, 142, 81" title="Data Center = FE1 &#10;3PAR Storage Physcial Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 281, 289, 281, 363, 281, 363, 281" title="Data Center = EM2 &#10;3PAR Storage Available Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 100, 179, 100, 253, 100, 253, 100" title="Data Center = EM2 &#10;3PAR Storage Used Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 81, 68, 81, 142, 81, 142, 81" title="Data Center = EM2 &#10;3PAR Storage Physcial Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 281, 289, 281, 363, 281, 363, 281" title="Data Center = EM1 &#10;3PAR Storage Available Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 100, 179, 100, 253, 100, 253, 100" title="Data Center = EM1 &#10;3PAR Storage Used Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 81, 68, 81, 142, 81, 142, 81" title="Data Center = EM1 &#10;3PAR Storage Physcial Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 281, 289, 281, 363, 281, 363, 281" title="Data Center = AP2 &#10;3PAR Storage Available Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 100, 179, 100, 253, 100, 253, 100" title="Data Center = AP2 &#10;3PAR Storage Used Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 81, 68, 81, 142, 81, 142, 81" title="Data Center = AP2 &#10;3PAR Storage Physcial Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 281, 289, 281, 363, 281, 363, 281" title="Data Center = AP1 &#10;3PAR Storage Available Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 100, 179, 100, 253, 100, 253, 100" title="Data Center = AP1 &#10;3PAR Storage Used Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 81, 68, 81, 142, 81, 142, 81" title="Data Center = AP1 &#10;3PAR Storage Physcial Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 298, 289, 281, 363, 281, 363, 298" title="Data Center = AM2 - OGDC &#10;3PAR Storage Available Capacity (TB) = 21.23" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 238, 179, 100, 253, 100, 253, 238" title="Data Center = AM2 - OGDC &#10;3PAR Storage Used Capacity (TB) = 166.96" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 236, 68, 81, 142, 81, 142, 236" title="Data Center = AM2 - OGDC &#10;3PAR Storage Physcial Capacity (TB) = 188.19" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 298, 289, 298, 363, 298, 363, 298" title="Data Center = AM2 &#10;3PAR Storage Available Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 238, 179, 238, 253, 238, 253, 238" title="Data Center = AM2 &#10;3PAR Storage Used Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 236, 68, 236, 142, 236, 142, 236" title="Data Center = AM2 &#10;3PAR Storage Physcial Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 300, 289, 298, 363, 298, 363, 300" title="Data Center = AM1 - OGDC &#10;3PAR Storage Available Capacity (TB) = 1.93" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 300, 179, 238, 253, 238, 253, 300" title="Data Center = AM1 - OGDC &#10;3PAR Storage Used Capacity (TB) = 75.05" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 300, 68, 236, 142, 236, 142, 300" title="Data Center = AM1 - OGDC &#10;3PAR Storage Physcial Capacity (TB) = 76.98" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="289, 300, 289, 300, 363, 300, 363, 300" title="Data Center = AM1 &#10;3PAR Storage Available Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="179, 300, 179, 300, 253, 300, 253, 300" title="Data Center = AM1 &#10;3PAR Storage Used Capacity (TB) = 0" tabIndex="-1">
			<area class="chart_area" type="chartElement" shape="POLY" coords="68, 300, 68, 300, 142, 300, 142, 300" title="Data Center = AM1 &#10;3PAR Storage Physcial Capacity (TB) = 0" tabIndex="-1">
		</map><span tabIndex="0"><img name="chartN0C7BF1C0.0B5E2EA8" style="padding-left: 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;" class="ch" LID="Combination Chart1" src="/images/reports/<?php echo $reportName; ?>.png" width="500" height="350" usemap="#rsvptt0" border="0"></span>
		<table style="border-collapse:collapse;width:100%;" class="tb" cellpadding="0">
			<tr class="tableRow">
				<td class="tableCell">
				<table style="border:1pt solid #9999CC;border-collapse:collapse;" class="ls" LID="List1" cellpadding="0">
					<tr>
						<td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC" class="lt"><span tabIndex="0" class="textItem">Data Center</span></td><td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC" class="lt"><span tabIndex="-1" class="textItem">3PAR Storage Physcial Capacity (TB)</span></td><td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC" class="lt"><span tabIndex="-1" class="textItem">3PAR Storage Used Capacity (TB)</span></td><td style="color:#FFFFFF;background-color:#666699;background-image:none;border:1pt solid #9999CC" class="lt"><span tabIndex="-1" class="textItem">3PAR Storage Available Capacity (TB)</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AM1</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AM1 - OGDC</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">76.98</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">75.05</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">1.93</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AM2</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AM2 - OGDC</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">188.19</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">166.96</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">21.23</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AP1</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">AP2</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">EM1</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">EM2</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">FE1</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">FE2</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">In Country</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">Other</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">48.64</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">48.41</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">0.23</span></td>
					</tr>
					<tr>
						<td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">Total</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">313.81</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">290.42</span></td><td style="color:#000000;background-color:#F3F3F3;background-image:none;border:1pt solid #FFFFFF" class="lm"><span tabIndex="-1" class="textItem">23.39</span></td>
					</tr>
				</table></td>
			</tr>
		</table></td>
	</tr>
	<tr class="tableRow">
		<td style="padding-top:10px;" class="pf">
		<table style="border-collapse:collapse;width:100%;" class="tb" cellpadding="0">
			<tr class="tableRow">
				<td style="width:25%;vertical-align:top;text-align:left;" class="tableCell"><span tabIndex="0" class="textItem">Aug 12, 2014</span></td><td style="width:50%;vertical-align:top;text-align:center;" class="tableCell"><span tabIndex="0" class="textItem">1</span></td><td style="width:25%;vertical-align:top;text-align:right;" class="tableCell"><span tabIndex="0" class="textItem">4:00:10 AM</span></td>
			</tr>
		</table></td>
	</tr>
</table>
<?php } ?>
<?php if($reportName == "268-770"){ ?>
    <table xmlns:rsext="xalan://com.cognos.reportserver.ext.RSExt" cellpadding="0" cellspacing="0" border="0" class="pg" LID="Page1">
	<tr class="tableRow">
		<td style="padding-bottom:10px;" class="ph">
		<div class="ta">
			<span tabIndex="0" class="tt">Capacity Utilization Report: VMAX 268_770 FE-1</span>
		</div></td>
	</tr>
	<tr class="tableRow">
		<td class="pb"><div class="block"></div>
		<div class="block">
			<span tabIndex="0" style="font-family:&quot;Arial Black&quot;;font-weight:bold;" class="textItem">Array Summary</span>
		</div>
		<div style="height:8mm;" class="block">
			<table style="border-collapse:collapse;" class="ls" LID="List2" cellpadding="0">
				<tr>
					<td class="lt"><span tabIndex="0" class="textItem">Array</span></td><td class="lt"><span tabIndex="-1" class="textItem">Data Center</span></td><td class="lt"><span tabIndex="-1" class="textItem">Raw Capacity (TB)</span></td><td class="lt"><span tabIndex="-1" class="textItem">Provisioned Capacity (TB)</span></td>
				</tr>
				<tr>
					<td class="lm"><span tabIndex="-1" class="textItem">Sym-000292602770</span></td><td class="lm"><span tabIndex="-1" class="textItem">FE2</span></td><td class="lm"><span tabIndex="-1" class="textItem">151.41</span></td><td class="lm"><span tabIndex="-1" class="textItem">105.99</span></td>
				</tr>
			</table><div class="block"></div>
			<div class="block">
				<span tabIndex="0" class="textItem"></span>
			</div><span tabIndex="0" style="font-family:&quot;Arial Black&quot;;font-weight:bold;" class="textItem">Volume Details</span>
		</div>
		<div style="height:8mm;" class="block">
			<div class="block">
				<span tabIndex="0" style="padding:10px 18px 10px 18px;" class="textItem">No Data Available</span>
			</div>
		</div></td>
	</tr>
	<tr class="tableRow">
		<td style="padding-top:10px;" class="pf"></td>
	</tr>
</table>
<?php } ?>
<?php if($reportName == 1){ ?>
    
<?php } ?>
<?php if($reportName == 1){ ?>
    
<?php } ?>
<?php if($reportName == 1){ ?>
    
<?php } ?>
<?php if($reportName == 1){ ?>
    
<?php } ?>
<?php if($reportName == 1){ ?>
    
<?php } ?>
<?php if($reportName == 1){ ?>
    
<?php } ?>
<?php if($reportName == 1){ ?>
    
<?php } ?>
<?php if($reportName == 1){ ?>
    
<?php } ?>
<?php if($reportName == 1){ ?>
    
<?php } ?>
<?php if($reportName == 1){ ?>
    
<?php } ?>
