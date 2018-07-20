<script type="text/javascript">
    //FUNCTION TO ASSIST WITH AUTO ADDRESS INPUT USING GOOGLE MAPS API3
    //<![CDATA[
    window.onload=function(){

        var componentForm = {
          /*street_number: 'short_name',*/
          /*route: 'long_name',*/
          locality: 'long_name',
          administrative_area_level_1: 'short_name',
          administrative_area_level_2: 'long_name',
          /*country: 'long_name',*/
          postal_code: 'short_name'
        };

        if(document.getElementById("location"))
        {
            var input = document.getElementById('location');
            var options;
            // var opions = {componentRestrictions: {country: 'us'}};
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        }

        if(document.getElementById("postal_code"))
        {
            var input = document.getElementById('postal_code');
            var options;
            // var opions = {componentRestrictions: {country: 'us'}};
            var autocomplete = new google.maps.places.Autocomplete(input, options);

            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
              document.getElementById(component).value = '';
              document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
              var addressType = place.address_components[i].types[0];
              if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;

                $(document.getElementById(addressType)).parent().addClass('is-dirty');
              }
            }
        }

     }//]]>
</script>
