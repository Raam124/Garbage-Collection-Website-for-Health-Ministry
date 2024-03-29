<?php
include_once 'header.php';
include 'locations-model.php';


?>
<style type="text/css">

    #map{

        height: 100%;
        width: 950px;
        float: left;
        margin-top: -300px;

    }
    #im{
        height: 100%;
        float:right;
        width: 25%;
        margin-top: -200px;
        margin-right: -30px;
    }


</style>

<div id="im">


    <?php
    $connect = mysqli_connect("localhost", "root", "", "testing");
    if(isset($_POST["insert"]))
    {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "INSERT INTO tbl_images(name) VALUES ('$file')";
        if(mysqli_query($connect, $query))
        {
            echo '<script>alert("Image Inserted into Database")</script>';
        }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Webslesson Tutorial | Insert and Display Images From Mysql Database in PHP</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
    <br /><br />
    <div class="container" style="width:25%;">
        <h1 align="center">Display Images </h1>
        <br />

        <br />
        <br />
        <table class="table table-bordered">
            <tr>
                <th>Image</th>
            </tr>
            <?php
            $query = "SELECT * FROM tbl_images ORDER BY id DESC";
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($result))
            {
                echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';
            }
            ?>
        </table>
    </div>
    </body>
    </html>
    <script>
        $(document).ready(function(){
            $('#insert').click(function(){
                var image_name = $('#image').val();
                if(image_name == '')
                {
                    alert("Please Select Image");
                    return false;
                }
                else
                {
                    var extension = $('#image').val().split('.').pop().toLowerCase();
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                    {
                        alert('Invalid Image File');
                        $('#image').val('');
                        return false;
                    }
                }
            });
        });
    </script>



</div>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw">
</script>

<div id="map"></div>
<script>
    /**
     * Create new map
     */
    var infowindow;
    var map;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
    var locations = <?php get_confirmed_locations() ?>;
    var myOptions = {
        zoom: 7,
        center: new google.maps.LatLng( 6.927079, 79.861244),
        mapTypeId: 'roadmap'
    };
    map = new google.maps.Map(document.getElementById('map'), myOptions);


    var markers = {};


    var getMarkerUniqueId= function(lat, lng) {
        return lat + '_' + lng;
    };


    var getLatLng = function(lat, lng) {
        return new google.maps.LatLng(lat, lng);
    };


    var addMarker = google.maps.event.addListener(map, 'click', function(e) {
        var lat = e.latLng.lat(); // lat of clicked point
        var lng = e.latLng.lng(); // lng of clicked point
        var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
        var marker = new google.maps.Marker({
            position: getLatLng(lat, lng),
            map: map,
            animation: google.maps.Animation.DROP,
            id: 'marker_' + markerId,
            html: "    <div id='info_"+markerId+"'>\n" +
                "        <table class=\"map1\">\n" +
                "            <tr>\n" +
                "                <td><a>Descriptiooooon:</a></td>\n" +
                "                <td><textarea  id='manual_description' placeholder='Description'></textarea></td></tr>\n" +
                "            <tr><td></td><td><input type='button' value='Save' onclick='saveData("+lat+","+lng+")'/></td></tr>\n" +
               " <a href='image.php'> Upload Image</a>"+


                "        </table>\n" +
                "    </div>"



        });





        markers[markerId] = marker; // cache marker in markers object
        bindMarkerEvents(marker); // bind right click event to marker
        bindMarkerinfo(marker); // bind infowindow with click event to marker
    });


    var bindMarkerinfo = function(marker) {
        google.maps.event.addListener(marker, "click", function (point) {
            var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
            var marker = markers[markerId]; // find marker
            infowindow = new google.maps.InfoWindow();
            infowindow.setContent(marker.html);
            infowindow.open(map, marker);
            // removeMarker(marker, markerId); // remove it
        });
    };


    var bindMarkerEvents = function(marker) {
        google.maps.event.addListener(marker, "rightclick", function (point) {
            var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
            var marker = markers[markerId]; // find marker
            removeMarker(marker, markerId); // remove it
        });
    };


    var removeMarker = function(marker, markerId) {
        marker.setMap(null); // set markers setMap to null to remove it from map
        delete markers[markerId]; // delete marker instance from markers object
    };



    var i ; var confirmed = 0;
    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon :   locations[i][4] === '1' ?  red_icon  : purple_icon,
            html: "<div>\n" +
                "<table class=\"map1\">\n" +
                "<tr>\n" +
                "<td><a>Description:</a></td>\n" +
                "<td><textarea disabled id='manual_description' placeholder='Description'>"+locations[i][3]+"</textarea></td></tr>\n" +
                "</table>\n" +
                "</div>"
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow = new google.maps.InfoWindow();
                confirmed =  locations[i][4] === '1' ?  'checked'  :  0;
                $("#confirmed").prop(confirmed,locations[i][4]);
                $("#id").val(locations[i][0]);
                $("#description").val(locations[i][3]);
                $("#form").show();
                infowindow.setContent(marker.html);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }


    function saveData(lat,lng) {
        var description = document.getElementById('manual_description').value;
        var url = 'locations-model.php?add_location&description=' + description + '&lat=' + lat + '&lng=' + lng;
        downloadUrl(url, function(data, responseCode) {
            if (responseCode === 200  && data.length > 1) {
                var markerId = getMarkerUniqueId(lat,lng); // get marker id by using clicked point's coordinate
                var manual_marker = markers[markerId]; // find marker
                manual_marker.setIcon(purple_icon);
                infowindow.close();
                infowindow.setContent("<div style=' color: purple; font-size: 25px;'> Waiting for admin confirm!!</div>");
                infowindow.open(map, manual_marker);

            }else{
                console.log(responseCode);
                console.log(data);
                infowindow.setContent("<div style='color: red; font-size: 25px;'>Inserting Errors</div>");
            }
        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                callback(request.responseText, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }


</script>





<?php
include_once 'footer.php';

?>
