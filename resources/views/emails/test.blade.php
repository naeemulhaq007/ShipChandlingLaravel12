<h1>{{ $title }}</h1>
<p>{{ $body }}</p>
@if ($QuoteNo)
<p>QuoteNo : {{ $QuoteNo }}</p>
@endif
@if ($CustomerName)
<p>Customer Name : {{ $CustomerName }}</p>
@endif
@if ($VesselName)
<p>Vessel Name : {{ $VesselName }}</p>
@endif
@if ($VendorName)
<p>VendorName : {{ $VendorName }}</p>
@endif


<a
href="{{$Link}}"
>Go To Page</a>
