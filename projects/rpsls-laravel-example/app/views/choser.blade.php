<div style="width:100%;text-align:center;">
@if (isset($yourChoice))
    <span style="text-align:center;font-weight:bold;font-size:22px;">You {{ $results }}!<br>You chose {{ $yourChoice }}, I chose {{ $myChoice }}</span> <br>

Play again!
@endif
Choose your action<br><br>
<img src="/RPSLS.png" usemap="rpslsmap">

<map name="rpslsmap">
    <!-- #$-:Image map file created by GIMP Image Map plug-in -->
    <!-- #$-:GIMP Image Map plug-in by Maurits Rijk -->
    <!-- #$-:Please do not edit lines starting with "#$" -->
    <!-- #$VERSION:2.3 -->
    <!-- #$AUTHOR:Tom Rideout -->
    <area shape="circle" coords="293,117,89" href="\throw\scissors" />
    <area shape="circle" coords="491,250,91" href="\throw\paper" />
    <area shape="circle" coords="419,483,97" href="\throw\rock" />
    <area shape="circle" coords="183,484,90" href="\throw\lizard" />
    <area shape="circle" coords="111,254,90" href="\throw\spock" />
</map>
</div>