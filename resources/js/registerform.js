document.addEventListener("DOMContentLoaded", function () {


document.getElementById('copy-address').addEventListener('change', function() {
    if (this.checked) {
       let selectedDistrict = document.getElementById('permanent_district').value;
       let selectedState = document.getElementById('permanent_state').value;
       let selectedVdcMuni = document.getElementById('permanent_vdcmun').value;
       let selectedWard =  document.getElementById('permanent_ward').value;
       let selectedStreetName = document.getElementById('Subscriber_permanent_streetname').value;
       let selectedhousenumber = document.getElementById('Subscriber_permanent_housenumber').value;
       document.getElementById('current_state').value = selectedState ;
       document.getElementById('current_district').value = selectedDistrict;
       document.getElementById('current_vdcmun').value = selectedVdcMuni;
       document.getElementById('current_ward').value = selectedWard;
       document.getElementById('Subscriber_current_streetname').value = selectedStreetName;
       document.getElementById('Subscriber_current_housenumber').value = selectedhousenumber;
    }
   });


   document.getElementById('subscriber_type').addEventListener('change', function() {
    let selectedValue = this.value;
    let fatherdiv = document.getElementById('fatherdiv');
    let motherNameDiv = document.getElementById('motherdiv');
    let grandparentNameDiv = document.getElementById('grandparentdiv');
    let organizationNameDiv = document.getElementById('orgname');
    let organizationreg = document.getElementById('orgreg');
    let firstnamediv = document.getElementById('firstname');
    let middlenamediv = document.getElementById('middlename');
    let lastnamediv = document.getElementById('lastname');
    let gender = document.getElementById('gender');
    let occupation = document.getElementById('occupation');
    let spousediv = document.getElementById('spousediv');
    


   
    if (selectedValue === 'organization') {
       
       motherNameDiv.style.display = 'none';
       grandparentNameDiv.style.display = 'none';
       organizationNameDiv.style.display = 'block';
       organizationreg.style.display = 'block'; 
       firstnamediv.style.display = 'none';
       middlenamediv.style.display = 'none';
       lastnamediv.style.display = 'none';
       gender.style.display = 'none';
       fatherdiv.style.display = 'none';
       occupation.style.display = 'none';
       spousediv.style.display = 'none';
       


    } else {
       
       motherNameDiv.style.display = 'block';
       grandparentNameDiv.style.display = 'block';
       organizationNameDiv.style.display = 'none';
       organizationreg.style.display = 'none';
       firstnamediv.style.display = 'block';
       middlenamediv.style.display = 'block';
       lastnamediv.style.display = 'block';
       gender.style.display = 'block';
       fatherdiv.style.display = 'block';
       occupation.style.display = 'block';
       spousediv.style.display = 'block';
       



    }
   });

});