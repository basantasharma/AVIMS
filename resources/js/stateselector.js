const data = {
    "State 1": {
       "District 1": {
            "City 1":[1,2,3,4,5,6,7,8,9,10,11,12], 
            "City 2":[1,2,3,4,5,6,7,8,9,10,11,12,13,14]
        },
       "District 2": {
            "City 3":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16], 
            "City 4":[1,2,3,4,5,6,7,8,9,10,11,12,13,14]
        },
        "District 3": {
            "City 5":[1,2,3,4,5,6,7,8,9,10,11,12], 
            "City 6":[1,2,3,4,5,6,7,8,9,10,11,12,13,14]
        },
       "District 4": {
            "City 7":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16], 
            "City 8":[1,2,3,4,5,6,7,8,9,10,11,12,13,14]
        }
    },
    "State 2": {
        "District 5": {
             "City 9":[1,2,3,4,5,6,7,8,9,10,11,12], 
             "City 10":[1,2,3,4,5,6,7,8,9,10,11,12,13,14]
         },
        "District 6": {
             "City 11":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16], 
             "City 12":[1,2,3,4,5,6,7,8,9,10,11,12,13,14]
         },
         "District 7": {
             "City 13":[1,2,3,4,5,6,7,8,9,10,11,12], 
             "City 14":[1,2,3,4,5,6,7,8,9,10,11,12,13,14]
         },
        "District 8": {
             "City 15":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16], 
             "City 16":[1,2,3,4,5,6,7,8,9,10,11,12,13,14]
         }
     },
    // Add more states, districts, and cities as needed
   };



document.addEventListener('DOMContentLoaded', function() {
    const stateSelect = document.getElementById('stateSelect');
    Object.keys(data).forEach(state => {
       const option = document.createElement('option');
       option.value = state;
       option.textContent = state;
       stateSelect.appendChild(option);
    });
});


document.getElementById('stateSelect').addEventListener('change', function() {
    const state = this.value;
    const districtSelect = document.getElementById('districtSelect');
    districtSelect.innerHTML = '<option value="">Select a District</option>';
    const districts = data[state];
    Object.keys(districts).forEach(district => {
       const option = document.createElement('option');
       option.value = district;
       option.textContent = district;
       districtSelect.appendChild(option);
    });
});
   
document.getElementById('districtSelect').addEventListener('change', function() {
    const state = document.getElementById('stateSelect').value;
    const district = this.value;
    const citySelect = document.getElementById('citySelect');
    citySelect.innerHTML = '<option value="">Select a City</option>';
    const cities = data[state][district];
    cities.forEach(city => {
       const option = document.createElement('option');
       option.value = city;
       option.textContent = city;
       citySelect.appendChild(option);
    });
});