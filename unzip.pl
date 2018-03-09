use IO::Uncompress::Unzip qw(unzip $UnzipError) ;
    my $status = unzip $input => $output [,OPTS]
        or die "unzip failed: $UnzipError\n";
    my $z = new IO::Uncompress::Unzip $input [OPTS] 
        or die "unzip failed: $UnzipError\n";
    $status = $z->read($buffer)
    $status = $z->read($buffer, $length)
    $status = $z->read($buffer, $length, $offset)
    $line = $z->getline()
    $char = $z->getc()
    $char = $z->ungetc()
    $char = $z->opened()
    $status = $z->inflateSync()
    $data = $z->trailingData()
    $status = $z->nextStream()
    $data = $z->getHeaderInfo()
    $z->tell()
    $z->seek($position, $whence)
    $z->binmode()
    $z->fileno()
    $z->eof()
    $z->close()
    $UnzipError ;
    # IO::File mode
    <$z>
    read($z, $buffer);
    read($z, $buffer, $length);
    read($z, $buffer, $length, $offset);
    tell($z)
    seek($z, $position, $whence)
    binmode($z)
    fileno($z)
    eof($z)
    close($z)


 use IO::Uncompress::Unzip qw(unzip $UnzipError) ;
    unzip $input_filename_or_reference => $output_filename_or_reference [,OPTS] 
        or die "unzip failed: $UnzipError\n";
