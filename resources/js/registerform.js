import districts from "./districts.json";
import municipalities from "./municipalities.json";
import state from "./state.json";

document.addEventListener("DOMContentLoaded", function () {


    document
        .getElementById("subscriber_type")
        .addEventListener("change", function () {
            let selectedValue = this.value;
            let fatherdiv = document.getElementById("fatherdiv");
            let motherNameDiv = document.getElementById("motherdiv");
            let grandparentNameDiv = document.getElementById("grandparentdiv");
            let organizationNameDiv = document.getElementById("orgname");
            let organizationreg = document.getElementById("orgreg");
            let firstnamediv = document.getElementById("subscriber_firstname");
            let middlenamediv = document.getElementById(
                "subscriber_middlename"
            );
            let lastnamediv = document.getElementById("subscriber_lastname");
            let gender = document.getElementById("gender");
            let occupation = document.getElementById("subscriber_occupation");
            let spousediv = document.getElementById("spousediv");

            if (selectedValue === "organization") {
                motherNameDiv.style.display = "none";
                grandparentNameDiv.style.display = "none";
                organizationNameDiv.style.display = "block";
                organizationreg.style.display = "block";
                firstnamediv.style.display = "none";
                middlenamediv.style.display = "none";
                lastnamediv.style.display = "none";
                gender.style.display = "none";
                fatherdiv.style.display = "none";
                occupation.style.display = "none";
                spousediv.style.display = "none";
            } else {
                motherNameDiv.style.display = "block";
                grandparentNameDiv.style.display = "block";
                organizationNameDiv.style.display = "none";
                organizationreg.style.display = "none";
                firstnamediv.style.display = "block";
                middlenamediv.style.display = "block";
                lastnamediv.style.display = "block";
                gender.style.display = "block";
                fatherdiv.style.display = "block";
                occupation.style.display = "block";
                spousediv.style.display = "block";
            }
        });

    ("use strict");

    const steps = document.querySelectorAll(".step");
    const prevBtn = document.getElementById("prevbtn");
    const nextBtn = document.getElementById("nxtbtn");
    const submitBtn = document.getElementById("submitbtn");

    submitBtn.style.display = "none";

    let currentStep = 0;

    // Show the current step and hide others
    function showStep(step) {
        steps.forEach((s, index) => {
            s.style.display = index === step ? "block" : "none";
            console.log(currentStep);
        });
    }

    // Next button click
    nextBtn.addEventListener("click", () => {
        currentStep++;
        if (currentStep >= steps.length - 1) {
            // Hide the next button and show the submit button on the last step
            nextBtn.style.display = "none";
            submitBtn.style.display = "inline-block";
        }
        showStep(currentStep);

        if (currentStep === 0) {
            prevBtn.disabled = true;
        } else {
            prevBtn.disabled = false;
        }
    });

    // Previous button click
    prevBtn.addEventListener("click", () => {
        currentStep--;

        if (currentStep < steps.length - 1) {
            // Show the next button and hide the submit button
            nextBtn.style.display = "inline-block";
            submitBtn.style.display = "none";
        }
        showStep(currentStep);

        if (currentStep > 0) {
            prevBtn.disabled = false;
        } else {
            prevBtn.disabled = true;
        }
    });

    // Initially show the first step
    showStep(currentStep);
    if (currentStep === 0) {
        prevBtn.disabled = true;
    } else {
        prevBtn.disabled = false;
    }
    const selectpermanent_state = document.getElementById("permanent_state");
    const selectpermanent_district =
        document.getElementById("permanent_district");
    const selectcurrent_state = document.getElementById("current_state");
    const selectcurrent_district = document.getElementById("current_district");
    const selectpermanent_vdcmun = document.getElementById("permanent_vdcmun");
    const selectcurrent_vdcmun = document.getElementById("current_vdcmun");


    // Filter permanent district => permanent state .............................................................

    if (!selectpermanent_state || !selectpermanent_district) {
        console.error("Select elements not found. Please check their IDs.");
        return;
    }

    state.forEach((state) => {
        const option = document.createElement("option");
        option.value = state.name;
        option.textContent = state.name;
        selectpermanent_state.appendChild(option);
    });

    selectpermanent_state.addEventListener("change", () => {
        const selectedStatename = selectpermanent_state.value;
        console.log(selectedStatename);

        let selectedStateId;
        state.forEach((state) => {
            if (state.name === selectedStatename) {
                selectedStateId = state.id;
                return null;
            }
        });

        const filteredDistricts = districts.filter(
            (district) => district.state_id === selectedStateId
        );

        selectpermanent_district.innerHTML = "";

        if (filteredDistricts.length > 0) {
            filteredDistricts.forEach((district) => {
                const option = document.createElement("option");
                option.value = district.name;
                option.textContent = district.name;
                selectpermanent_district.appendChild(option);
            });
        } else {
            const noDistrictOption = document.createElement("option");
            noDistrictOption.value = "";
            noDistrictOption.textContent = "No districts found for this state.";
            selectpermanent_district.appendChild(noDistrictOption);
        }
    });

    // Filter current district => current state .............................................................

    if (!selectcurrent_state || !selectcurrent_district) {
        console.error("Select elements not found. Please check their IDs.");
        return;
    }

    state.forEach((state) => {
        const option = document.createElement("option");
        option.value = state.name;
        option.textContent = state.name;
        selectcurrent_state.appendChild(option);
    });

    selectcurrent_state.addEventListener("change", () => {
        const selectedStatename = selectcurrent_state.value;

        let selectedStateId;
        state.forEach((state) => {
            if (state.name === selectedStatename) {
                selectedStateId = state.id;
                return null;
            }
        });

        const filteredDistricts = districts.filter(
            (district) => district.state_id === selectedStateId
        );

        selectcurrent_district.innerHTML = "";

        if (filteredDistricts.length > 0) {
            filteredDistricts.forEach((district) => {
                const option = document.createElement("option");
                option.value = district.name;
                option.textContent = district.name;
                selectcurrent_district.appendChild(option);
            });
        } else {
            const noDistrictOption = document.createElement("option");
            noDistrictOption.value = "";
            noDistrictOption.textContent = "No districts found for this state.";
            selectcurrent_district.appendChild(noDistrictOption);
        }
    });

    // Filter Permanent VDC/Municipality => permanent district

    if (!selectpermanent_district || !selectpermanent_vdcmun) {
        console.error("Select elements not found. Please check their IDs.");
        return;
    }

    districts.forEach((district) => {
        const option = document.createElement("option");
        option.value = district.name;
        option.textContent = district.name;
        selectpermanent_district.appendChild(option);
    });

    selectpermanent_district.addEventListener("change", () => {
        const selectedDistrictname = selectpermanent_district.value;

        let selectedDistrictId;
        districts.forEach((district) => {
            if (district.name === selectedDistrictname) {
                selectedDistrictId = district.id;
                return null;
            }
        });

        const filteredVdcMun = municipalities.filter(
            (municipality) => municipality.district_id === selectedDistrictId
        );

        selectpermanent_vdcmun.innerHTML = "";

        if (filteredVdcMun.length > 0) {
            filteredVdcMun.forEach((municipality) => {
                const option = document.createElement("option");
                option.value = municipality.name;
                option.textContent = municipality.name;
                selectpermanent_vdcmun.appendChild(option);
            });
        } else {
            const nomunicipalityOption = document.createElement("option");
            nomunicipalityOption.value = "";
            nomunicipalityOption.textContent =
                "No VDC/MUNICIPALITY found for this District.";
            selectpermanent_vdcmun.appendChild(nomunicipalityOption);
        }
    });

  

    // Filter Current VDC/Municipality => current district

    if (!selectcurrent_district || !selectcurrent_vdcmun) {
        console.error("Select elements not found. Please check their IDs.");
        return;
    }

    districts.forEach((district) => {
        const option = document.createElement("option");
        option.value = district.name;
        option.textContent = district.name;
        selectcurrent_district.appendChild(option);
    });

    selectcurrent_district.addEventListener("change", () => {
        const selectedDistrictname = selectcurrent_district.value;

        let selectedDistrictId;
        districts.forEach((district) => {
            if (district.name === selectedDistrictname) {
                selectedDistrictId = district.id;
                return null;
            }
        });

        const filteredVdcMun = municipalities.filter(
            (municipality) => municipality.district_id === selectedDistrictId
        );

        selectcurrent_vdcmun.innerHTML = "";

        if (filteredVdcMun.length > 0) {
            filteredVdcMun.forEach((municipality) => {
                const option = document.createElement("option");
                option.value = municipality.name;
                option.textContent = municipality.name;
                selectcurrent_vdcmun.appendChild(option);
            });
        } else {
            const nomunicipalityOption = document.createElement("option");
            nomunicipalityOption.value = "";
            nomunicipalityOption.textContent =
                "No VDC/MUNICIPALITY found for this District.";
            selectcurrent_vdcmun.appendChild(nomunicipalityOption);
        }
    });

    
     //Filter permanent Ward => VDC/MUNICIPALITY
  
const selectpermanentWard = document.getElementById('permanent_ward'); 

selectpermanent_vdcmun.addEventListener('change', () => {
  const selectedMunicipalityName = selectpermanent_vdcmun.value;

  const selectedMunicipality = municipalities.find(municipality => municipality.name === selectedMunicipalityName);

  if (!selectedMunicipality) {
    console.error('Selected municipality not found.');
    return;
  }

  const numberOfWards = parseInt(selectedMunicipality.wards); 

  
  selectpermanentWard.innerHTML = '';

  if (numberOfWards > 0) {
    for (let i = 1; i <= numberOfWards; i++) {
      const option = document.createElement('option');
      option.value = i;
      option.textContent = i;
      selectpermanentWard.appendChild(option);
    }
  } else {
    const noWardsOption = document.createElement('option');
    noWardsOption.value = '';
    noWardsOption.textContent = 'No wards found for this municipality.';
    selectpermanentWard.appendChild(noWardsOption);
  }
});




// Filter current Ward => VDC/MUNICIPALITY
  
 const selectcurrentWard = document.getElementById('current_ward'); 

 selectcurrent_vdcmun.addEventListener('change', () => {
   const selectedMunicipalityName = selectcurrent_vdcmun.value;
 
   const selectedMunicipality = municipalities.find(municipality => municipality.name === selectedMunicipalityName);
 
   if (!selectedMunicipality) {
     console.error('Selected municipality not found.');
     return;
   }
 
   const numberOfWards = parseInt(selectedMunicipality.wards); // Parse the number of wards to an integer
 
   // Clear previous options
   selectcurrentWard.innerHTML = '';
 
   if (numberOfWards > 0) {
     for (let i = 1; i <= numberOfWards; i++) {
       const option = document.createElement('option');
       option.value = i;
       option.textContent = i;
       selectcurrentWard.appendChild(option);
     }
   } else {
     const noWardsOption = document.createElement('option');
     noWardsOption.value = '';
     noWardsOption.textContent = 'No wards found for this municipality.';
     selectcurrentWard.appendChild(noWardsOption);
   }
 });



 document.getElementById('copy-address').addEventListener('change', function() {
    if (this.checked) {
        // Copy values from permanent address fields to current address fields
        selectcurrent_state.value = selectpermanent_state.value;
        selectcurrent_district.value = selectpermanent_district.value;
        selectcurrent_vdcmun.value = selectpermanent_vdcmun.value;
        selectcurrentWard.value = selectpermanentWard.value;
        let selectedStreetName = document.getElementById("Subscriber_permanent_streetname").value;
         let selectedhousenumber = document.getElementById("Subscriber_permanent_housenumber").value;
         document.getElementById("Subscriber_current_streetname").value = selectedStreetName;
         document.getElementById("Subscriber_current_housenumber").value = selectedhousenumber;
        

    } else {
        // Clear current address fields
        selectcurrent_state.value = '';
        selectcurrent_district.value = '';
        selectcurrent_vdcmun.value = '';
        selectcurrentWard.value = '';
        selectedStreetName.value = '';
        selectedhousenumber.value = '';
        
    }
});
 document
 .getElementById("copy-address")
 .addEventListener("change", function () {
     if (this.checked) {
         let selectedState =
             document.getElementById("permanent_state").value;
         let selectedDistrict =
             document.getElementById("permanent_district").value;
         let selectedVdcMuni =
             document.getElementById("permanent_vdcmun").value;
         let selectedWard = document.getElementById("permanent_ward").value;
         let selectedStreetName = document.getElementById("Subscriber_permanent_streetname").value;
         let selectedhousenumber = document.getElementById("Subscriber_permanent_housenumber").value;
        
         document.getElementById("current_state").value = selectedState;
         document.getElementById("current_district").value =
             selectedDistrict;
         document.getElementById("current_vdcmun").value =
             selectedVdcMuni;
         document.getElementById("current_ward").value = selectedWard;

         document.getElementById("Subscriber_current_streetname").value = selectedStreetName;
         document.getElementById("Subscriber_current_housenumber").value = selectedhousenumber;
     }
 });

    // Populate the select element with options
    districts.forEach((district) => {
        const option = document.createElement("option");
        option.value = district.name;
        option.textContent = district.name;
        selectpermanent_district.appendChild(option);
    });

    districts.forEach((district) => {
        const option = document.createElement("option");
        option.value = district.name;
        option.textContent = district.name;
        selectcurrent_district.appendChild(option);
    });

    municipalities.forEach((municipality) => {
        const option = document.createElement("option");
        option.value = municipality.name;
        option.textContent = municipality.name;
        selectpermanent_vdcmun.appendChild(option);
    });

    municipalities.forEach((municipality) => {
        const option = document.createElement("option");
        option.value = municipality.name;
        option.textContent = municipality.name;
        selectcurrent_vdcmun.appendChild(option);
    });

});
