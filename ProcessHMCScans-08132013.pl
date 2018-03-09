#!/usr/bin/perl -w
use Spreadsheet::ParseExcel;
use Spreadsheet::WriteExcel;
use Date::Calc qw(Delta_Days);
use DateTime;
use File::Path;
use Sys::Hostname;
use Net::FTP;
use Cwd;


################################################################################
#                   Confidential
#   Disclosure And Distribution Solely to Employees of
#   AIG and Its Affiliates Having a Need to Know
#
#   Copyright (c) 2012 AIG Inc,
#               All Rights Reserved
################################################################################
##      FILE:    ProcessHMCScans.pl
##
##      AUTHOR:  Murthy Karothi
##
##      DATE:    03/2013
##
##      PURPOSE: This script process the HMC scans data and 
##               generates desired output for management report.
##
##      INPUT   FILES:	Input.xls
##		OUTPUT  FILES:	Output.xls
##
##      CODE REVIEW INFO:
##         Date      	Actions
##	 	03/08/2013		Intial Version of the Script
##
##      REVISION HISTORY:
##         Date      	Author				Actions
##		03/08/2013   	Murthy Karothi		Initial Version 1.0
##
################################################################################
# Following sub programs used in this script
sub ftpFile(@);
sub execCmd(@);
sub printLog(@);
sub trimString($);
sub printLogAndExit(@);
sub readExcelFile($);
sub processSystemSummaryData($);
sub processLparSummaryData($);
sub processLparCPUData($);
sub processLparMEMData($);
sub writeFramesData(@);
sub writeLparsData(@);
sub DRProfileData();
sub determineAIXSize(@);


# Use the following line if you want to run for yesterdays file
#my $dt = DateTime->now->subtract(days => 1);
my $dt = DateTime->now(time_zone  => 'America/Chicago');

$year   = sprintf ("%04d", $dt->year);
$month  = sprintf ("%02d", $dt->month); 
$day  = sprintf ("%02d", $dt->day);  

############################ Test Server Initialization  ###############################
my $runningMachine = hostname();
my @iFrames = my @Frames740 = my @Frames750 = my @Lpars740 = my @Lpars750 = ();
my %FrameDetails = my %LparDetails = my %FrameColumnNumber = ();

#### i Frames are fixed, so pushing iFrames are pushing into separate Array
@iFrames = ('AM1P750C02-SN10F089P','AM2P750C0D-SN10F078P');

############################### Dev/Tes Server Intialization ###############################
	my $homeDir = getcwd;;
	#$ftpDir = "CiRBA-Data/CiRBA-System-Inventory-Processed-Files";

	$HMCInputFilesDir = $homeDir . "\\InputFiles";
	$processedOutputFile = $homeDir . "\\OutputFiles\\HMCScans_$month-$day-$year.xls";
	$logFile = "${homeDir}\\TodaysLog.txt";

############################### Main Program  ##################################
###-----------------------------------------------------------------------------
### Assign Database Variables Here like host, sid, port, userid, password, etc..

open(LOG, ">$logFile") or die "Cannot open the $logFile file for writing";
LOG->autoflush(1);

printLog ("processing started at " . scalar(localtime) );

###### Reading the input Excel files to extract data #################
print "Your Input files Directory : $HMCInputFilesDir \n";
opendir(my $dh, $HMCInputFilesDir) || printLogAndExit("The Source file $HMCInputFile does not exist:$_ ");
    @HMCScansInputfiles = grep { /\_scan/ && -f "$HMCInputFilesDir/$_" } readdir($dh);
closedir $dh;

###### Reading each Excel file Here ##############
##########################################33333333
my $e = new Spreadsheet::ParseExcel;

foreach $HMCInputFile (@HMCScansInputfiles) {
	print "Working on the file : $HMCInputFile \n";
	readExcelFile("${HMCInputFilesDir}\\${HMCInputFile}");
}

### removing duplicates in Lpar arrays
my %seen = ();
@Lpars740 = grep { !$seen{$_}++ } @Lpars740;
@Lpars750 = grep { !$seen{$_}++ } @Lpars750;


###### Writing output Excel file Here ##############
##########################################33333333
##Creating a new output file for writing...
	my $workbook = Spreadsheet::WriteExcel->new($processedOutputFile) or die "Could not create a new Excel file $processedOutputFile: $!";;
# Define the format and add it to the worksheet
	my $format = $workbook->add_format(
	center_across => 1,
	bold => 1,
	size => 10,
	border => 4,
	color => 'black',
	bg_color => 'cyan',
	border_color => 'black',
	align => 'vcenter',
	);
	my $format2 = $workbook->add_format(
	center_across => 1,
	bold => 1,
	size => 10,
	border => 4,
	color => 'black',
	bg_color => 'yellow',
	border_color => 'black',
	align => 'vcenter',
	);
	my $format3 = $workbook->add_format(
	center_across => 1,
	bold => 1,
	size => 10,
	border => 4,
	color => 'black',
	bg_color => 'gray',
	border_color => 'black',
	align => 'vcenter',
	);
	
	# Add a worksheet to output spreadsheet
	my $worksheet1 = $workbook->add_worksheet('Frames_P740');
	my $worksheet2 = $workbook->add_worksheet('Frames_P750');
	my $worksheet3 = $workbook->add_worksheet('Frames(iSerices)');
	my $worksheet4 = $workbook->add_worksheet('Lpars_P740');
	my $worksheet5 = $workbook->add_worksheet('Lpars_P750');
	my $worksheet6 = $workbook->add_worksheet('DR Profiles');
	
	# Change width for only first column
	$worksheet1->set_column(0,0,20);
	$worksheet2->set_column(0,0,20);
	$worksheet3->set_column(0,0,20);
	$worksheet4->set_column(0,0,20);
	$worksheet5->set_column(0,0,20);
	$worksheet6->set_column(0,0,20);
#############
#
#### writing the Frames tab in excel file
#### wrting the Header here
	print "\nPlease wait!...Writing Output  file \n";
	writeFramesData(740, $worksheet1, @Frames740);
	writeFramesData(750, $worksheet2, @Frames750);
	writeFramesData(750, $worksheet3, @iFrames);
	print ". . . \n";
	writeLparsData(740, $worksheet4, @Lpars740);
	writeLparsData(750, $worksheet5, @Lpars750);
	DRProfileData();
	print "Finished Writing Output  file \n";

	$workbook->close();
	
exit 0;

################### End of  the Program ##################
##########################################################

################################################################################
# Reading Excel file here and get data from each tab
################################################################################

####### Reading the Excel file
sub readExcelFile($) {

	$HMCInputFile = shift;
	#my $e = new Spreadsheet::ParseExcel;
	my $eBook = $e->Parse(${HMCInputFile});
	
	my $sheets = $eBook->{SheetCount};
	my ($eSheet, $sheetName);

	foreach my $sheet (0 .. $sheets - 1) {
		$eSheet = $eBook->{Worksheet}[$sheet];
		$sheetName = $eSheet->{Name};
		#print "Worksheet $sheet: $sheetName\n";
		next unless (exists ($eSheet->{MaxRow}) and (exists ($eSheet->{MaxCol})));
		
		### Process onlyfew tabs in the excel file. no need to read every tab in the excel sheet
		processSystemSummaryData($eSheet) if ($sheetName =~ /System Summary/i);
		processLparSummaryData($eSheet) if ($sheetName =~ /LPAR Summary/i);
		processLparCPUData($eSheet) if ($sheetName =~ /LPAR CPU/i);
		processLparMEMData($eSheet) if ($sheetName =~ /LPAR MEM/i);

		next;
	
    #foreach my $row ($eSheet->{MinRow} .. $eSheet->{MaxRow}) {
     #   foreach my $column ($eSheet->{MinCol} .. $eSheet->{MaxCol}) {
      #      next unless (defined $eSheet->{Cells}[$row][$column]);
       #     print POUT $eSheet->{Cells}[$row][$column]->Value . ",";
        #}
        #print POUT "\n";
    }
	#$eBook->close();
			
	return;
}

################################################################################
# writing Frames data into 2 separate tabs in Excel output
################################################################################

sub writeFramesData(@) {
	my $type = shift;
	my $worksheet = shift;
	my @FrameArray = @_;

	my $rowNo = my $columnNo = 0;
	$worksheet->write($rowNo, $columnNo++, "Frame", $format);
	$worksheet->write($rowNo, $columnNo++, "Type", $format);
	$worksheet->write($rowNo, $columnNo++, "NGDC", $format);
	$worksheet->write($rowNo, $columnNo++, "Zone", $format);
	$worksheet->write($rowNo, $columnNo++, "Cores Installed", $format);
	$worksheet->write($rowNo, $columnNo++, "Cores Available", $format);
	$worksheet->write($rowNo, $columnNo++, "Cores Used", $format);
	$worksheet->write($rowNo, $columnNo++, "Cores Used %", $format);
	$worksheet->write($rowNo, $columnNo++, "Memory Installed(GB)", $format);
	$worksheet->write($rowNo, $columnNo++, "Memory Available(GB)", $format);
	$worksheet->write($rowNo, $columnNo++, "Memory Used(GB)", $format);
	$worksheet->write($rowNo, $columnNo++, "Memory Used %", $format);
	$worksheet->write($rowNo, $columnNo++, "Total %", $format);
	
	#$worksheet->write($rowNo, $columnNo++, "Active Physical Cores Size", $format);
	#$worksheet->write($rowNo, $columnNo++, "Active Physical Cores Assigned", $format);
	#$worksheet->write($rowNo, $columnNo++, "Active Physical Cores Available", $format);
	#$worksheet->write($rowNo, $columnNo++, "Dedicated Cores Size", $format);
	#$worksheet->write($rowNo, $columnNo++, "Dedicated Cores Assigned", $format);
	#$worksheet->write($rowNo, $columnNo++, "Dedicated Cores Available", $format);
	#$worksheet->write($rowNo, $columnNo++, "Shared Pool Size", $format);
	#$worksheet->write($rowNo, $columnNo++, "Shared Pool Assigned", $format);
	#$worksheet->write($rowNo, $columnNo++, "Shared Pool Available", $format);
	#$worksheet->write($rowNo, $columnNo++, "Virtual Processors Size", $format);
	#$worksheet->write($rowNo, $columnNo++, "Virtual Processors Assigned", $format);
	#$worksheet->write($rowNo, $columnNo++, "Virtual Processors Available", $format);
	
	

	foreach $frame (@FrameArray) {
	
		$rowNo++;
		$columnNo = 0;
		
		my $ngdc = substr($frame, 0, 3);
		   $ngdc = 'AM1' if ($ngdc =~ /LIV/i);
		   $ngdc = 'AM2' if ($ngdc =~ /FTW/i);
		my $zone = substr($frame, 7, 2);
		   $zone = 'Core' if ( ($zone =~ /C0/i) || ($zone =~ /CO/i) );
		   $zone = 'DMZ1' if ($zone =~ /D1/i);
		   $zone = 'DMZ2' if ($zone =~ /D2/i);
		   $zone = 'Host' if ($zone =~ /HO/i);
		
		my $coresInstalled = my $coresAvailable = my $memoryInstalled = my $memoryAvailable = 0; 
		my $coresUsedPercent = my $memorysUsedPercent = my $totalUsedPercent = 0.00;
		$coresInstalled = $FrameDetails{"$frame\#Cores#Installed"} if (defined($FrameDetails{"$frame\#Cores#Installed"}));
		$coresAvailable = $FrameDetails{"$frame\#Cores#Curr Avail"} if (defined($FrameDetails{"$frame\#Cores#Curr Avail"}));
		$coresUsed = $coresInstalled - $coresAvailable;
		$coresUsedPercent = sprintf( "%.2f", ($coresUsed / $coresInstalled) * 100 ) if ($coresInstalled != 0);
		$memoryInstalled = $FrameDetails{"$frame\#Memory (MB)#Installed"} if (defined($FrameDetails{"$frame\#Memory (MB)#Installed"}));
		   $memoryInstalled = sprintf( "%.1f", ($memoryInstalled / 1024)) if ($memoryInstalled > 1024);
		$memoryAvailable = $FrameDetails{"$frame\#Memory (MB)#Curr Avail"} if (defined($FrameDetails{"$frame\#Memory (MB)#Curr Avail"}));
		   $memoryAvailable = sprintf( "%.1f", ($memoryAvailable / 1024));
		$memoryUsed =  $memoryInstalled - $memoryAvailable;

		$memorysUsedPercent = sprintf ( "%.2f", ($memoryUsed / $memoryInstalled) * 100 ) if ($memoryInstalled != 0);
		$totalUsedPercent = sprintf ( "%.2f", ($coresUsedPercent + $memorysUsedPercent) / 2);
		
		$worksheet->write($rowNo, $columnNo++, $frame);
		$worksheet->write($rowNo, $columnNo++, $type);
		$worksheet->write($rowNo, $columnNo++, $ngdc);
		$worksheet->write($rowNo, $columnNo++, $zone);
		$worksheet->write($rowNo, $columnNo++, $coresInstalled);
		$worksheet->write($rowNo, $columnNo++, $coresAvailable);
		$worksheet->write($rowNo, $columnNo++, $coresUsed);
		$worksheet->write($rowNo, $columnNo++, $coresUsedPercent);
		$worksheet->write($rowNo, $columnNo++, $memoryInstalled);
		$worksheet->write($rowNo, $columnNo++, $memoryAvailable);
		$worksheet->write($rowNo, $columnNo++, $memoryUsed);
		$worksheet->write($rowNo, $columnNo++, $memorysUsedPercent);
		$worksheet->write($rowNo, $columnNo++, $totalUsedPercent);
		
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#PhyscialCoresSize"});
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#PhyscialCoresAssigned"});
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#PhyscialCoresAvailable"});
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#DedicatedCoresSize"} );
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#DedicatedCoresAssigned"});
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#DedicatedCoresAvailable"});
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#SharedPoolSize"});
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#SharedPoolAssigned"});
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#SharedPoolAvailable"});
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#VirtualProcessorsSize"});
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#VirtualProcessorsAssigned"});
		#$worksheet->write($rowNo, $columnNo++, $FrameDetails{"$frame\#VirtualProcessorsAvailable"});
	}
return;
}

################################################################################
# writing Lpars data into 2 separate tabs in Excel output
################################################################################

sub writeLparsData(@) {
	my $type = shift;
	my $worksheet = shift;
	my @LparArray = @_;

	my $rowNo = my $columnNo = 0;
	$worksheet->write($rowNo, $columnNo++, "Lpar", $format);
	$worksheet->write($rowNo, $columnNo++, "ID", $format);
	$worksheet->write($rowNo, $columnNo++, "Status", $format);
	$worksheet->write($rowNo, $columnNo++, "Environment", $format);
	$worksheet->write($rowNo, $columnNo++, "OS Version", $format);
	$worksheet->write($rowNo, $columnNo++, "Pool Data", $format);
	$worksheet->write($rowNo, $columnNo++, "Proc Mode", $format);
	$worksheet->write($rowNo, $columnNo++, "Frame Name", $format);
	$worksheet->write($rowNo, $columnNo++, "NGDC", $format);
	$worksheet->write($rowNo, $columnNo++, "Type", $format);
	$worksheet->write($rowNo, $columnNo++, "Zone", $format);

	$worksheet->write($rowNo, $columnNo++, "CPU Status", $format);
	$worksheet->write($rowNo, $columnNo++, "CPU Mode", $format);
	$worksheet->write($rowNo, $columnNo++, "Vir\/Phy Procs Min", $format);
	$worksheet->write($rowNo, $columnNo++, "Vir\/Phy Procs Curr", $format);
	$worksheet->write($rowNo, $columnNo++, "Vir\/Phy Procs Max", $format);
	$worksheet->write($rowNo, $columnNo++, "Entitlement Min", $format);
	$worksheet->write($rowNo, $columnNo++, "Entitlement Curr", $format);
	$worksheet->write($rowNo, $columnNo++, "Entitlement Max", $format);
	$worksheet->write($rowNo, $columnNo++, "Weight", $format);
	$worksheet->write($rowNo, $columnNo++, "Sharing Mode", $format);
	$worksheet->write($rowNo, $columnNo++, "Shared Pool Name", $format);
	$worksheet->write($rowNo, $columnNo++, "Shared Pool Resrv", $format);
	$worksheet->write($rowNo, $columnNo++, "Shared Pool Max", $format);
	
	$worksheet->write($rowNo, $columnNo++, "MEM Mode", $format);
	$worksheet->write($rowNo, $columnNo++, "MEM Min (GB)", $format);
	$worksheet->write($rowNo, $columnNo++, "MEM Curr (GB)", $format);
	$worksheet->write($rowNo, $columnNo++, "MEM Max (GB)", $format);
	$worksheet->write($rowNo, $columnNo++, "MEM ExpFact", $format);
	$worksheet->write($rowNo, $columnNo++, "Bucket Size", $format);
	

	foreach $lpar (@LparArray) {
		$rowNo++;
		$columnNo = 0;

		(my $frame, my $lparName) = split(/\|/, $lpar);
		
		my $ngdc = substr($frame, 0, 3);
		   $ngdc = 'AM1' if ($ngdc =~ /LIV/i);
		   $ngdc = 'AM2' if ($ngdc =~ /FTW/i);
		my $zone = substr($frame, 7, 2);
		   $zone = 'Core' if ( ($zone =~ /C0/i) || ($zone =~ /CO/i) );
		   $zone = 'DMZ1' if ($zone =~ /D1/i);
		   $zone = 'DMZ2' if ($zone =~ /D2/i);
		   $zone = 'Host' if ($zone =~ /HO/i);
		
		$worksheet->write($rowNo, $columnNo++, $lparName);
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#ID"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#Status"} );
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#Env"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#OS"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#Pool"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#Proc"});
		$worksheet->write($rowNo, $columnNo++, $frame);
		$worksheet->write($rowNo, $columnNo++, $ngdc);
		$worksheet->write($rowNo, $columnNo++, $type);
		$worksheet->write($rowNo, $columnNo++, $zone);
		
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#CPUStatus"} );
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#CMode"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#VPPMin"} );
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#VPPCurr"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#VPPMax"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#EntitleMin"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#EntitleCurr"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#EntitleMax"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#Weight"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#SharingMode"} );
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#SharePoolName"} );
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#SharePoolResrv"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#SharePoolMax"});
		
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#MMode"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#MEMMin"} );
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#MEMCurr"} );
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#MEMMax"});
		$worksheet->write($rowNo, $columnNo++, $LparDetails{"$lpar\#MEMExpFact"});
		
		my $maxCpu = $LparDetails{"$lpar\#EntitleMax"};
		my $maxMem = $LparDetails{"$lpar\#MEMMax"};
		$maxCpu = trimString($maxCpu);
		$maxMem = trimString($maxMem);
		my $bucketSize = determineAIXSize($maxCpu,$maxMem);
		$worksheet->write($rowNo, $columnNo++, $bucketSize);
	}
return;
}

################################################################################
# Process the System Summary tab data.
################################################################################
sub processSystemSummaryData($)
{
	my $eSheet = shift; ### input spreadsheet tab

	my $sheetName = $eSheet->{Name};
	
	$columHead1 = $columHead2 = "";
    foreach my $row ($eSheet->{MinRow} .. $eSheet->{MaxRow}) {
		foreach my $column ($eSheet->{MinCol} .. $eSheet->{MaxCol}) {
			if ($row == 0) {
				next unless (defined $eSheet->{Cells}[$row][$column]);
				my $frameName = trimString($eSheet->{Cells}[$row][$column]->Value);
				$FrameDetails{"$frameName\#Defined"} = 1;
				
				$FrameColumnNumber{$frameName} = $column;
				$FrameColumnNumber{$column} = $frameName;
				
				### skip if the frame name belongs to iFrame array.
				next if (grep(/${frameName}/i, @iFrames));
				push(@Frames740, $frameName) if($frameName =~ /740/);
				push(@Frames750, $frameName) if($frameName =~ /750/);
				
				next;
			}
			next unless (defined $eSheet->{Cells}[$row][$column]);
			next if($column < 2); ### no need to read column 1 and 2
			$columHead1 = trimString($eSheet->{Cells}[$row][0]->Value)  if ((defined $eSheet->{Cells}[$row][0]) && (length(trimString($eSheet->{Cells}[$row][0]->Value))  > 0));
			$columHead2 = trimString($eSheet->{Cells}[$row][1]->Value)  if ((defined $eSheet->{Cells}[$row][1]) && (length(trimString($eSheet->{Cells}[$row][1]->Value))  > 0));
		
			$columnHead = $columHead1 . "\#" . $columHead2 ;
			$frameName = $FrameColumnNumber{$column}; 
			#print "current $row --> $column  :" . $columHead1."--".trimString($eSheet->{Cells}[$row][1]->Value) . "kk". length(trimString($eSheet->{Cells}[$row][0]->Value)) ."\n";
			$FrameDetails{"$frameName\#$columnHead"} = trimString($eSheet->{Cells}[$row][$column]->Value);
        }
    }
}

################################################################################
# Process the Lpar Summary tab data.
################################################################################
sub processLparSummaryData($)
{
	my $eSheet = shift; ### input spreadsheet tab
	my $sheetName = $eSheet->{Name};
	my $currFrameName = "XXX";
	
    foreach my $row ($eSheet->{MinRow} .. $eSheet->{MaxRow}) {
		my $column = 0;
		## foreach my $column ($eSheet->{MinCol} .. $eSheet->{MaxCol}) { ### not using this for loop as I am going by column order manually. 
		next unless (defined $eSheet->{Cells}[$row][$column]);
		
		my $currValue = trimString($eSheet->{Cells}[$row][$column]->Value);
		
		
		if (defined($FrameDetails{"$currValue\#Defined"})) ## if it is frame, then skip it and go to next line to read Lpar data
		#if ( !(defined($eSheet->{Cells}[$row][1])) ) ##  && ( ($currValue=~ /740/i) || ($currValue=~ /750/i)) )
		{
			$currFrameName = $currValue;
			next; ## go to next row as you read the frame name row
		}
		$strlength = length(trimString($eSheet->{Cells}[$row][$column]->Value));
		next if ( ($currValue =~ /Name/i) || ($strlength  == 0) ) ; ## go to next row if it is a header or a blank line LparDetails
		
		my $LparName = lc trimString($eSheet->{Cells}[$row][0]->Value);
		### updating LparName as the FrameName + LparName as there could be same Lpar Names under different Frames
		   $LparName = "${currFrameName}\|${LparName}";
		#print " LLR $LparName : $currFrameName \n";
		
		## push to Array if at all it is  not defined before
	
		push(@Lpars740, $LparName) if ($currFrameName =~ /740/);
		push(@Lpars750, $LparName) if ($currFrameName =~ /750/);
		
		## define all fields to null now
		$LparDetails{"$LparName\#FrameName"} = $LparDetails{"$LparName\#ID"} = $LparDetails{"$LparName\#Status"} = $LparDetails{"$LparName\#Env"} = $LparDetails{"$LparName\#OS"} = $LparDetails{"$LparName\#Pool"} = $LparDetails{"$LparName\#Proc"} = "";
		
		my $LparID = trimString($eSheet->{Cells}[$row][1]->Value);
		my $LparStatus = trimString($eSheet->{Cells}[$row][2]->Value);
		my $LparEnv = trimString($eSheet->{Cells}[$row][3]->Value);
		my $LparOS = trimString($eSheet->{Cells}[$row][4]->Value);
		my $LparPool = trimString($eSheet->{Cells}[$row][5]->Value);
		my $LparProc = trimString($eSheet->{Cells}[$row][6]->Value);
		
		$LparDetails{"$LparName\#FrameName"} = $currFrameName;
		$LparDetails{"$LparName\#ID"} = $LparID;
		$LparDetails{"$LparName\#Status"} = $LparStatus;
		$LparDetails{"$LparName\#Env"} = $LparEnv;
		$LparDetails{"$LparName\#OS"} = $LparOS;
		$LparDetails{"$LparName\#Pool"} = $LparPool;
		$LparDetails{"$LparName\#Proc"} = $LparProc;
		
    }
return;
}

################################################################################
# Process the Lpar CPU tab data.
################################################################################
sub processLparCPUData($)
{
	my $eSheet = shift; ### input spreadsheet tab
	my $sheetName = $eSheet->{Name};
	my $currFrameName = "XXX";
    foreach my $row ($eSheet->{MinRow} .. $eSheet->{MaxRow}) {
		my $column = 0;
		## foreach my $column ($eSheet->{MinCol} .. $eSheet->{MaxCol}) { ### not using this for loop as I am going by column order manually. 
		next unless (defined $eSheet->{Cells}[$row][$column]);
		my $currValue = trimString($eSheet->{Cells}[$row][0]->Value);
		
		if (defined($FrameDetails{"$currValue\#Defined"})) ## if it is frame, then skip it and go to next line to read Lpar data
		#if ( !(defined($eSheet->{Cells}[$row][1])) ) ##  && ( ($currValue=~ /740/i) || ($currValue=~ /750/i)) )
		{
			$currFrameName = $currValue;
			#print "Frame name now : $currFrameName \n";
			next; ## go to next row as you read the frame name row
		}
		$strlength = length(trimString($eSheet->{Cells}[$row][0]->Value));
		next if ( ($currValue =~ /Name/i) || ($strlength  == 0) ) ; ## go to next row if it is a header or a blank line LparDetails
		
		### process the Active Physical Cores line and this data belongs to Frame
		#if ($currValue =~ /Active Physical Cores/i) { 
		#	$FrameDetails{"$currFrameName\#PhyscialCoresSize"} = $FrameDetails{"$currFrameName\#PhyscialCoresAssigned"} = $FrameDetails{"$currFrameName\#PhyscialCoresAvailable"} = "";
		#	
		#	$FrameDetails{"$currFrameName\#PhyscialCoresSize"}  = trimString($eSheet->{Cells}[$row][3]->Value) if (defined($eSheet->{Cells}[$row][3]));
		#	$FrameDetails{"$currFrameName\#PhyscialCoresAssigned"} = trimString($eSheet->{Cells}[$row][4]->Value) if (defined($eSheet->{Cells}[$row][4]));
		#	$FrameDetails{"$currFrameName\#PhyscialCoresAvailable"} = trimString($eSheet->{Cells}[$row][5]->Value) if (defined($eSheet->{Cells}[$row][5]));
		#	next;
		#}
		
		### process the Dedicated Cores line and this data belongs to Frame
		#if ($currValue =~ /Dedicated Cores/i) { 
		#$FrameDetails{"$currFrameName\#DedicatedCoresSize"} = $FrameDetails{"$currFrameName\#DedicatedCoresAssigned"}  = $FrameDetails{"$currFrameName\#DedicatedCoresAvailable"}= "";
		#	$FrameDetails{"$currFrameName\#DedicatedCoresSize"}  = trimString($eSheet->{Cells}[$row][3]->Value) if (defined($eSheet->{Cells}[$row][3]));
		#	$FrameDetails{"$currFrameName\#DedicatedCoresAssigned"} = trimString($eSheet->{Cells}[$row][4]->Value) if (defined($eSheet->{Cells}[$row][4]));
		#	$FrameDetails{"$currFrameName\#DedicatedCoresAvailable"} = trimString($eSheet->{Cells}[$row][5]->Value) if (defined($eSheet->{Cells}[$row][5]));
		#	next;
		#}
		
		### process the Shared Pool line and this data belongs to Frame
		#if ($currValue =~ /Shared Pool/i) { 
		#	$FrameDetails{"$currFrameName\#SharedPoolSize"}  = $FrameDetails{"$currFrameName\#SharedPoolAssigned"}  = $FrameDetails{"$currFrameName\#SharedPoolAvailable"} = "";
		#	$FrameDetails{"$currFrameName\#SharedPoolSize"}  = trimString($eSheet->{Cells}[$row][3]->Value) if (defined($eSheet->{Cells}[$row][3]));
		#	$FrameDetails{"$currFrameName\#SharedPoolAssigned"} = trimString($eSheet->{Cells}[$row][4]->Value) if (defined($eSheet->{Cells}[$row][4]));
		#	$FrameDetails{"$currFrameName\#SharedPoolAvailable"} = trimString($eSheet->{Cells}[$row][5]->Value) if (defined($eSheet->{Cells}[$row][5]));
		#	next;
		#}
		
		### process the Virtual Processors line and this data belongs to Frame
		#if ($currValue =~ /Virtual Processors/i) { 
		#	$FrameDetails{"$currFrameName\#VirtualProcessorsSize"}  = $FrameDetails{"$currFrameName\#VirtualProcessorsAssigned"}  = $FrameDetails{"$currFrameName\#VirtualProcessorsAvailable"}  = "";
		#	$FrameDetails{"$currFrameName\#VirtualProcessorsSize"}  = trimString($eSheet->{Cells}[$row][3]->Value)  if (defined($eSheet->{Cells}[$row][3]));
		#	$FrameDetails{"$currFrameName\#VirtualProcessorsAssigned"} = trimString($eSheet->{Cells}[$row][4]->Value)  if (defined($eSheet->{Cells}[$row][4]));
		#	$FrameDetails{"$currFrameName\#VirtualProcessorsAvailable"} = trimString($eSheet->{Cells}[$row][5]->Value)  if (defined($eSheet->{Cells}[$row][5]));
		#	next;
		#}
		
		### if you come here because it is a Lpar details line
		my $LparName = lc trimString($eSheet->{Cells}[$row][0]->Value);
		### updating LparName as the FrameName + LparName as there could be same Lpar Names under different Frames
		   $LparName = "${currFrameName}\|${LparName}";
		   #print " LLR--2 $LparName : $currFrameName \n";
		
		## push to Array if at all it is  not defined before
		#push(@Lpars740, $LparName) if ( ($currFrameName =~ /740/) && !(defined($LparDetails{"$LparName\#CPUStatus"})));
		#push(@Lpars750, $LparName) if ( ($currFrameName =~ /750/) && !(defined($LparDetails{"$LparName\#CPUStatus"})));
		
		## define all fields to null now
		$LparDetails{"$LparName\#CPUStatus"} = $LparDetails{"$LparName\#CMode"} = $LparDetails{"$LparName\#VPPMin"} = $LparDetails{"$LparName\#VPPCurr"} = $LparDetails{"$LparName\#VPPMax"} = $LparDetails{"$LparName\#EntitleMin"} = $LparDetails{"$LparName\#EntitleCurr"} = $LparDetails{"$LparName\#EntitleMax"} = $LparDetails{"$LparName\#Weight"} = $LparDetails{"$LparName\#SharingMode"} = $LparDetails{"$LparName\#SharePoolName"} = $LparDetails{"$LparName\#SharePoolResrv"} = $LparDetails{"$LparName\#SharePoolMax"} = "";

		
		$LparDetails{"$LparName\#CPUStatus"} = trimString($eSheet->{Cells}[$row][1]->Value) if (defined($eSheet->{Cells}[$row][1]));
		$LparDetails{"$LparName\#CMode"} = trimString($eSheet->{Cells}[$row][2]->Value) if (defined($eSheet->{Cells}[$row][2]));
		
		$LparDetails{"$LparName\#VPPMin"} = trimString($eSheet->{Cells}[$row][3]->Value) if (defined($eSheet->{Cells}[$row][3]));
		$LparDetails{"$LparName\#VPPCurr"} = trimString($eSheet->{Cells}[$row][4]->Value) if (defined($eSheet->{Cells}[$row][4]));
		$LparDetails{"$LparName\#VPPMax"} = trimString($eSheet->{Cells}[$row][5]->Value) if (defined($eSheet->{Cells}[$row][5]));
		
		
		$LparDetails{"$LparName\#EntitleMin"} = trimString($eSheet->{Cells}[$row][6]->Value) if (defined($eSheet->{Cells}[$row][6]));
		$LparDetails{"$LparName\#EntitleCurr"} = trimString($eSheet->{Cells}[$row][7]->Value) if (defined($eSheet->{Cells}[$row][7]));
		$LparDetails{"$LparName\#EntitleMax"} = trimString($eSheet->{Cells}[$row][8]->Value) if (defined($eSheet->{Cells}[$row][8]));
		
		$LparDetails{"$LparName\#Weight"} = trimString($eSheet->{Cells}[$row][9]->Value) if (defined($eSheet->{Cells}[$row][9]));
		$LparDetails{"$LparName\#SharingMode"} = trimString($eSheet->{Cells}[$row][10]->Value) if (defined($eSheet->{Cells}[$row][10]));
		
		$LparDetails{"$LparName\#SharePoolName"} = trimString($eSheet->{Cells}[$row][11]->Value) if (defined($eSheet->{Cells}[$row][11]));
		$LparDetails{"$LparName\#SharePoolResrv"} = trimString($eSheet->{Cells}[$row][12]->Value) if (defined($eSheet->{Cells}[$row][12]));
		$LparDetails{"$LparName\#SharePoolMax"} = trimString($eSheet->{Cells}[$row][13]->Value) if (defined($eSheet->{Cells}[$row][13]));

		
		#push(@Lpars740, $LparName) if ( ($currFrameName =~ /740/) && (!(grep (/"${currFrameName}\|${LparName}"/i, @Lpars740) ))) ;
		#push(@Lpars750, $LparName) if ( ($currFrameName =~ /750/) && (!(grep (/"${currFrameName}\|${LparName}"/i, @Lpars750) ))) ;	
				
		#$LparDetails{"$LparName\#FrameName"} = $currFrameName if !(defined($LparDetails{"$LparName\#FrameName"}));
    }
return;
}

################################################################################
# Process the Lpar MEM tab data.
################################################################################
sub processLparMEMData($)
{
	my $eSheet = shift; ### input spreadsheet tab
	my $sheetName = $eSheet->{Name};
	my $currFrameName = "XXX";
    foreach my $row ($eSheet->{MinRow} .. $eSheet->{MaxRow}) {
		my $column = 0;
		## foreach my $column ($eSheet->{MinCol} .. $eSheet->{MaxCol}) { ### not using this for loop as I am going by column order manually. 
		next unless (defined $eSheet->{Cells}[$row][$column]);
		my $currValue = trimString($eSheet->{Cells}[$row][0]->Value);
		
		if (defined($FrameDetails{"$currValue\#Defined"})) ## if it is frame, then skip it and go to next line to read Lpar data
		#if ( !(defined($eSheet->{Cells}[$row][1])) ) ##  && ( ($currValue=~ /740/i) || ($currValue=~ /750/i)) )
		{
			$currFrameName = $currValue;
			#print "Frame name now : $currFrameName \n";
			next; ## go to next row as you read the frame name row
		}
		$strlength = length(trimString($eSheet->{Cells}[$row][0]->Value));
		next if ( ($currValue =~ /Name/i) || ($strlength  == 0) ) ; ## go to next row if it is a header or a blank line LparDetails
		
		### if you come here because it is a Lpar details line
		my $LparName = lc trimString($eSheet->{Cells}[$row][0]->Value);
		### updating LparName as the FrameName + LparName as there could be same Lpar Names under different Frames
		   $LparName = "${currFrameName}\|${LparName}";
		   
		## push to Array if at all it is  not defined before
		#push(@Lpars740, $LparName) if ( ($currFrameName =~ /740/) && !(defined($LparDetails{"$LparName\#MMode"})));
		#push(@Lpars750, $LparName) if ( ($currFrameName =~ /750/) && !(defined($LparDetails{"$LparName\#MMode"})));
		
		## define all fields to null now
		$LparDetails{"$LparName\#MMode"} = "";
		$LparDetails{"$LparName\#MEMMin"} = $LparDetails{"$LparName\#MEMCurr"} = $LparDetails{"$LparName\#MEMMax"} = $LparDetails{"$LparName\#MEMExpFact"} = 0;

		$LparDetails{"$LparName\#MMode"} = trimString($eSheet->{Cells}[$row][1]->Value) if (defined($eSheet->{Cells}[$row][1]));
		
		my $MemMin = trimString($eSheet->{Cells}[$row][2]->Value) if (defined($eSheet->{Cells}[$row][2]));
		$MemMin = 0 if ($MemMin eq "");
		$LparDetails{"$LparName\#MEMMin"} = sprintf( "%.1f", ($MemMin / 1024));
		#print " --> $MemMin \n";
	
		my $MemCurr = trimString($eSheet->{Cells}[$row][3]->Value) if (defined($eSheet->{Cells}[$row][3]));
		$MemCurr = 0 if ($MemCurr eq "");
		$LparDetails{"$LparName\#MEMCurr"} = sprintf( "%.1f", ($MemCurr / 1024));
		#print " --> $MemCurr \n";
		
		my $MemMax = trimString($eSheet->{Cells}[$row][4]->Value) if (defined($eSheet->{Cells}[$row][4]));
		$MemMax = 0 if ($MemMax eq "");
		$LparDetails{"$LparName\#MEMMax"} = sprintf( "%.1f", ($MemMax / 1024));
		#print " --> $MemMax \n";
		
		$LparDetails{"$LparName\#MEMExpFact"} = trimString($eSheet->{Cells}[$row][5]->Value) if (defined($eSheet->{Cells}[$row][5]));

		#push(@Lpars740, $LparName) if ( ($currFrameName =~ /740/) && !(grep (/"${currFrameName}\|${LparName}"/i, @Lpars740) )) ;
		#push(@Lpars750, $LparName) if ( ($currFrameName =~ /750/) && !(grep (/"${currFrameName}\|${LparName}"/i, @Lpars750) )) ;	

    }
return;
}

################################################################################
# writing Lpars data into 2 separate tabs in Excel output
################################################################################

sub DRProfileData() {
	my $rowNo = my $columnNo = 0;
	$worksheet6->write($rowNo, $columnNo++, "Lpar", $format);
	$worksheet6->write($rowNo, $columnNo++, "Environment", $format);
	$worksheet6->write($rowNo, $columnNo++, "OS Version", $format);
	$worksheet6->write($rowNo, $columnNo++, "Frame Name", $format);
	$worksheet6->write($rowNo, $columnNo++, "NGDC", $format);
	$worksheet6->write($rowNo, $columnNo++, "Zone", $format);
	$worksheet6->write($rowNo, $columnNo++, "Entitlement Min", $format);
	$worksheet6->write($rowNo, $columnNo++, "Entitlement Curr", $format);
	$worksheet6->write($rowNo, $columnNo++, "Entitlement Max", $format);
	$worksheet6->write($rowNo, $columnNo++, "MEM Min (GB)", $format);
	$worksheet6->write($rowNo, $columnNo++, "MEM Curr (GB)", $format);
	$worksheet6->write($rowNo, $columnNo++, "MEM Max (GB)", $format);
	
	$worksheet6->write($rowNo, $columnNo++, "DR Count", $format3);
	
	$worksheet6->write($rowNo, $columnNo++, "DR_Lpar", $format2);
	$worksheet6->write($rowNo, $columnNo++, "Environment", $format2);
	$worksheet6->write($rowNo, $columnNo++, "OS Version", $format2);
	$worksheet6->write($rowNo, $columnNo++, "Frame Name", $format2);
	$worksheet6->write($rowNo, $columnNo++, "NGDC", $format2);
	$worksheet6->write($rowNo, $columnNo++, "Zone", $format2);
	$worksheet6->write($rowNo, $columnNo++, "Entitlement Min", $format2);
	$worksheet6->write($rowNo, $columnNo++, "Entitlement Curr", $format2);
	$worksheet6->write($rowNo, $columnNo++, "Entitlement Max", $format2);
	$worksheet6->write($rowNo, $columnNo++, "MEM Min (GB)", $format2);
	$worksheet6->write($rowNo, $columnNo++, "MEM Curr (GB)", $format2);
	$worksheet6->write($rowNo, $columnNo++, "MEM Max (GB)", $format2);
	

	my @LparArray = (@Lpars740,@Lpars750);


	foreach $lpar (@LparArray) {

	($frame, $lparName) = split(/\|/, $lpar);
	next if ( ($lparName !~ /^p/i) || ($lparName =~ /^dr/i) || ($lparName =~ /dr$/i) );

	
		$rowNo++;
		$columnNo = 0;		
		
		my $ngdc = substr($frame, 0, 3);
		   $ngdc = 'AM1' if ($ngdc =~ /LIV/i);
		   $ngdc = 'AM2' if ($ngdc =~ /FTW/i);
		my $zone = substr($frame, 7, 2);
		   $zone = 'Core' if ( ($zone =~ /C0/i) || ($zone =~ /CO/i) );
		   $zone = 'DMZ1' if ($zone =~ /D1/i);
		   $zone = 'DMZ2' if ($zone =~ /D2/i);
		   $zone = 'Host' if ($zone =~ /HO/i);
		
		$worksheet6->write($rowNo, $columnNo++, $lparName);
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$lpar\#Env"});
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$lpar\#OS"});
		$worksheet6->write($rowNo, $columnNo++, $frame);
		$worksheet6->write($rowNo, $columnNo++, $ngdc);
		$worksheet6->write($rowNo, $columnNo++, $zone);
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$lpar\#EntitleMin"});
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$lpar\#EntitleCurr"});
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$lpar\#EntitleMax"});
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$lpar\#MEMMin"} );
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$lpar\#MEMCurr"} );
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$lpar\#MEMMax"});

		
		my @dr_Lpars1 = grep(/dr_${lparName}/i, @LparArray);
		my @dr_Lpars2 = grep(/${lparName}dr/i, @LparArray);
		my @dr_Lpars = (@dr_Lpars1, @dr_Lpars2);
		$dr_len = scalar @dr_Lpars;
		
		$worksheet6->write($rowNo, $columnNo++, $dr_len, $format3);
		if ($dr_len == 0) {
				next;
		}elsif ($dr_len > 1) {
				print "Identified multiple DR profiles for  ${lparName} : \n";
				print  "$dr_Lpars[0],$dr_Lpars[1]  -----  \n";
		}
		
		my $dr_lpar = shift(@dr_Lpars);
		(my $dr_frame, my $dr_lparName) = split(/\|/, $dr_lpar);

		my $dr_ngdc = substr($dr_frame, 0, 3);
		   $dr_ngdc = 'AM1' if ($dr_ngdc =~ /LIV/i);
		   $dr_ngdc = 'AM2' if ($dr_ngdc =~ /FTW/i);
		my $dr_zone = substr($dr_frame, 7, 2);
		   $dr_zone = 'Core' if ( ($dr_zone =~ /C0/i) || ($dr_zone =~ /CO/i) );
		   $dr_zone = 'DMZ1' if ($dr_zone =~ /D1/i);
		   $dr_zone = 'DMZ2' if ($dr_zone =~ /D2/i);
		   $dr_zone = 'Host' if ($dr_zone =~ /HO/i);
		
		$worksheet6->write($rowNo, $columnNo++, $dr_lparName);
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$dr_lpar\#Env"});
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$dr_lpar\#OS"});
		$worksheet6->write($rowNo, $columnNo++, $dr_frame);
		$worksheet6->write($rowNo, $columnNo++, $dr_ngdc);
		$worksheet6->write($rowNo, $columnNo++, $dr_zone);
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$dr_lpar\#EntitleMin"});
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$dr_lpar\#EntitleCurr"});
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$dr_lpar\#EntitleMax"});
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$dr_lpar\#MEMMin"} );
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$dr_lpar\#MEMCurr"} );
		$worksheet6->write($rowNo, $columnNo++, $LparDetails{"$dr_lpar\#MEMMax"});

	}
return;
}

################################################################################
# Determin AIX Size Here
################################################################################
sub determineAIXSize(@)
{
    my $cpu = shift;
	my $mem = shift;
		
	my $size = "9.Cannot Determine";
	### Following statement is not required as above statement takes care of it
	#$size = "9.Cannot Determine" if ( ( ($cpu eq "") || ($mem eq "") );

	if ( ($cpu eq "N/A") || ($cpu eq "-") || ($cpu eq "") ) {
		$size = "8.Unknown";
	}elsif ( ($cpu < 0) && ($mem eq "N/A") ){
		$size = "8.Unknown";
	}elsif ( ($cpu <= .4) && ($mem <= 8192) ){
		$size = "7.Small";
	}elsif ( ($cpu <= .4) && ($mem > 8192) ){
		$size = "6.Small Medium";
	}elsif ( ($cpu < 1) && ($mem <= 16384) ){
		$size = "5.Medium";
	}elsif ( ($cpu < 1) && ($mem > 16384) ){
		$size = "4.Medium Large";
	}elsif ( ($cpu <= 4) && ($mem <= 32768) ){
		$size = "3.Large";
	}elsif ( ($cpu <= 4) && ($mem > 32768) ){
		$size = "2.Extra Large";
	}elsif ($cpu > 4) {
		$size = "1.Gigantic";
	}else {
		$size = "9.Cannot Determine";
	}
	
    return $size;
}


################################################################################
# Trim the string here
################################################################################
sub trimString($)
{
    my $string = shift;
    return 0 if (!defined($string));
    $string =~ s/^\s+//;
    $string =~ s/\s+$//;
    $string =~ s/\"+//g;
    return $string;
}

###-----------------------------------------------------------------------------

################################################################################
# send message to normal trace log
################################################################################
sub printLog(@)
{
    my ($message) = @_;
    print LOG "CiRBA Duplicates Processing: " . $message . "\n";
}

################################################################################
# send message to normal trace log, and exit app
################################################################################
sub printLogAndExit(@)
{
    my ($message) = @_;
    printLog($message);
    close(LOG);
    exit(1);
}

################################################################################
# Executing command line command
################################################################################
sub execCmd(@)
{
    my ($Cmd, $errMsg) = @_;
	#print "Executing : " . $Cmd ."\n";
	system($Cmd);
	# if ( $? >> 8 ) {
	if ( $? > 10 ) {
		printLog("$errMsg $! \n");
		printLog("Erros in executing $Cmd \n Please check the logs after completion of the program \n command return code : $? \n");
	}
}

################################################################################
# FTP output file to FTP Server
################################################################################
sub ftpFile(@) {
	$ftpServer = "pwgsfscirbaftp1.r1-core.r1.aig.net";
	$ftpUserName = "cirbaadmin";
	$ftpPassword = "c1r3a321";
	
	(my $FTPFile,my $ftpDir) = @_;

	printLogAndExit("LocalFile: ${FTPFile} does not exist to FTP to FTPServer") if (! -e "${FTPFile}");
		
	$ftp = Net::FTP->new("${ftpServer}", Debug => 0)
		or printLogAndExit("Cannot connect to FTP Server $ftpServer: $@");
		
	$ftp->login("${ftpUserName}","${ftpPassword}")
		or printLogAndExit("Cannot login ", $ftp->message);
	
	$ftp->cwd("$ftpDir")
		or printLogAndExit("Cannot change working directory ", $ftp->message);
		
	$ftp->binary
		or printLogAndExit("Cannot change to binary mode", $ftp->message);

	#$ftp->put("${FTPFile}")
	#	or printLogAndExit("put failed for the ${localDir}\\${FTPFile} file ", $ftp->message);
		
	$ftp->quit;
}


