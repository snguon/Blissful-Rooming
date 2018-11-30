<?php
include "top.php";
require_once("lib/Parcels.php");
$allParcels = new Parcels($thisDatabaseWriter, "fldMapColor");
require_once("lib/Parcel.php");
?>

<script>
    function displayData(id, cssId) {
        var page = 'parcelDisplay.php?pid='
        var url = page.concat(id)
        loadXMLDoc(url, cssId);
    }
</script>

<article id="main">
    <h2><?php echo ASSOCIATION_NAME; ?></h2>
    <figure class='right'>
        <img src="images/<?php echo strtolower(ASSOCIATION_NAME_SHORT) . ".png"; ?>" alt="<?php echo ASSOCIATION_NAME; ?>" usemap="#propertyBoundries" id="properties">
        <!-- see: http://www.outsharked.com/imagemapster/examples/usa.html -->
        <map id="propertyBoundries" name="propertyBoundries">
            <?php
            foreach ($allParcels->getParcelId() as $key => $pid) {
                $thisParcel = new Parcel($thisDatabaseWriter, $pid);
                print '<area color="' . $thisParcel->getMapColor() . '" ';
                print 'shape="' . $thisParcel->getMapShape() . '" ';
                print 'coords="' . $thisParcel->getMapCoordinates() . '" ';
                print 'href="#" ';
                print 'alt="' . $thisParcel->getMapAlt() . '" ';
                print 'onclick="displayData(' . $thisParcel->getParcelId() . ', \'parcelData\');"';
                print '>';
                print LINE_BREAK;
            }
            ?>
        </map>   
    </figure>
    <p></p>
</article>

<aside id="parcelData">
</aside>

<?php include "footer.php"; ?>

<script>
    $(document).ready(function ()
    {
        $('#properties').mapster({
            singleSelect: true,
            render_highlight: {altImage: 'images/<?php echo strtolower(ASSOCIATION_NAME_SHORT) . "2.png"; ?>'},
            mapKey: 'color',
            fill: true,
            fillColor: '000000',
            fillOpacity: .25,
        });
    });
</script>
</body>
</html>
<!-- 
 <map id="propertyBoundries" name="propertyBoundries">
      <area color="A" shape="poly" coords="108,242,49,205,40,216,86,261,100,261" href="#" alt="Property A" onclick="displayData('A');">
      <area color="B" shape="poly" coords="50,204,59,185,100,203,109,220,109,240" href="#" alt="Property B" onclick="displayData('B');">
     
      <area color="C" shape="poly" coords="115,290,88,263,105,263,111,244,112,219,121,218,140,230,151,229" href="#" alt="C" onclick="displayData('C');">
      <area color="D" shape="poly" coords="129,179,121,186,122,216,143,228,154,228,161,210,150,195,144,180" href="#" alt="D" onclick="displayData('D');">
       <area color="E" shape="poly" coords="129,54,59,184,100,200,112,217,120,217,120,185,147,139,190,156,216,102" href="#" alt="E" onclick="displayData('E');">
      <area color="F" shape="poly" coords="148,139,202,170,189,193,166,208,161,207,152,195,146,181,128,178" href="#" alt="F" onclick="displayData('F');">
      <area color="G" shape="poly" coords="213,117,371,201,350,247,191,160" href="#" alt="G" onclick="displayData('G');">
      <area color="H" shape="poly" coords="156,7,245,51,219,101,130,53" href="#" alt="H" onclick="displayData('H');">
      <area color="I" shape="poly" coords="214,116,374,201,378,190,397,198,397,1,270,1" href="#" alt="I" onclick="displayData('I');">
      <area color="J" shape="poly" coords="203,169,265,204,228,271,157,232,163,211,190,198" href="#" alt="J" onclick="displayData('J');">
      <area color="I" shape="poly" coords="267,205,397,275,397,359,232,270" href="#" alt="I" onclick="displayData('I');">
      <area color="K" shape="poly" coords="230,273,313,317,290,363,207,319" href="#" alt="K" onclick="displayData('K');">-->

