    <?php ob_start(); ?>
    <div id="Commune"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $.ajax({
            url: "https://geoip-db.com/jsonp",
            jsonpCallback: "callback",
            dataType: "jsonp",
            success: function( location ) {
                $('#country').html(location.country_name);
                $('#state').html(location.state);
                $('#city').html(location.city);
                $('#latitude').html(location.latitude);
                $('#longitude').html(location.longitude);
                $('#ip').html(location.IPv4);  
                
                var Ville = location.city;
                var Long = location.latitude;
                var Lat = location.longitude;

                $('#Commune').load('/hackathon/code/Ajax/Definie_Ville.php #maj',{Ajax_Ville:Ville,Ajax_Long:Long,Ajax_Lat:Lat}); 
                alert(location.city); }
        });     
    </script>
    <a href="/Hackathon/code/index.php/accueil_action">
    <?php $scripts = ob_get_clean(); ?>