use warnings; 
use Win32::OLE qw(in with); 
use Win32::OLE::Const 'Microsoft Outlook'; 
$Win32::OLE::Warn = 3;  # die on errors... 


my $objOutlook = Win32::OLE->GetActiveObject('Outlook.Application') || 
Win32::OLE->new('Outlook.Application', 'Quit'); 


my $objOutlookMsg = $objOutlook->CreateItem(olMailItem); 


$objOutlookMsg->{'To'} = "satyamurthy.karothi\@dexyp.com"; 
$objOutlookMsg->{'Subject'} = "Test"; 
$objOutlookMsg->{'Body'} = "This is a test"; 


# Add thew attachment "Source", Type, Position, 'Display Name' 
# Display name must match file name - don't forget to escape the "\" 
$objOutlookMsg->{'Attachments'}->Add("C:\\Temp\\mail.pl", olByValue, 1, 'mynewfilename.pl'); 


$objOutlookMsg->Display(); 