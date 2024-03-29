document.addEventListener("DOMContentLoaded", function () {


document.getElementById('copy-address').addEventListener('change', function() {
    if (this.checked) {
       let selectedDistrict = document.getElementById('permanent_district').value;
       let selectedState = document.getElementById('permanent_state').value;
       let selectedVdcMuni = document.getElementById('permanent_vdcmun').value;
       let selectedWard =  document.getElementById('permanent_ward').value;
       let selectedStreetName = document.getElementById('Subscriber_permanent_streetname').value;
       let selectedStreetNumber = document.getElementById('Subscriber_permanent_streetnumber').value;
       document.getElementById('current_state').value = selectedState ;
       document.getElementById('current_district').value = selectedDistrict;
       document.getElementById('current_vdcmun').value = selectedVdcMuni;
       document.getElementById('current_ward').value = selectedWard;
       document.getElementById('Subscriber_current_streetname').value = selectedStreetName;
       document.getElementById('Subscriber_current_streetnumber').value = selectedStreetNumber;
    }
   });

});