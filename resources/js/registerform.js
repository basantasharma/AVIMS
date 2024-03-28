document.addEventListener("DOMContentLoaded", function () {
  const typeSelect = document.getElementById("subscriber_type");
  const personalInfo = document.getElementById("personalInfo");
  const contactInfo = document.getElementById("contactInfo");
  const organizationInfo = document.getElementById("organizationInfo");
  const installationInfo = document.getElementById("installationInfo");
  const myform =  document.getElementById("registrationForm");
  const nextBtn = document.getElementById("nextBtn");
  const prevBtn = document.getElementById("prevBtn");
  let currentStep = 0;

  function showStep() {
    personalInfo.classList.add("hidden");
    contactInfo.classList.add("hidden");
    organizationInfo.classList.add("hidden");
    installationInfo.classList.add("hidden");

    if (currentStep === 1) {
      personalInfo.classList.remove("hidden");
      prevBtn.classList.add("hidden");
      nextBtn.classList.remove("hidden");
      submitbtn.classList.add("hidden");

    } else if (currentStep === 2) {
      if (typeSelect.value === "home" || typeSelect.value === "") {
        contactInfo.classList.remove("hidden");
        nextBtn.classList.remove("hidden");
        prevBtn.classList.remove("hidden");
      submitbtn.classList.add("hidden");

      } else if (typeSelect.value === "organization") {
        organizationInfo.classList.remove("hidden");
        prevBtn.classList.add("hidden");
        nextBtn.classList.remove("hidden");
      submitbtn.classList.add("hidden");

      }
    } else if (currentStep === 3) {
      if (typeSelect.value === "organization") {
        contactInfo.classList.remove("hidden");
        prevBtn.classList.add("hidden");
      submitbtn.classList.add("hidden");

      
        
      }
      
      // organizationInfo.classList.remove("hidden");
      nextBtn.classList.remove("hidden");
      prevBtn.classList.remove("hidden");
      submitbtn.classList.add("hidden");

    } else if (currentStep === 4) {
      installationInfo.classList.remove("hidden");
      prevBtn.classList.remove("hidden");
      submitbtn.classList.remove("hidden");
    }
  }
  showStep();

  typeSelect.addEventListener("change", function () {
    let placeholder = document.getElementById("typeSelectPlaceholder");
    if (this.value === "home") {
      // this.classList.add("hidden");
      placeholder.classList.remove("hidden");
      currentStep = 1;
      showStep();
    } else if (this.value === "organization") {
      // this.classList.add("hidden");
      placeholder.classList.remove("hidden");
      currentStep = 2;
      showStep();
    } else {
      this.classList.remove("hidden");
      // placeholder.classList.add("hidden");
    }
  });
 




  nextBtn.classList.add("hidden");
  nextBtn.addEventListener("click", function () {

    // if (!validateCurrentStep()){
    //   // event.preventDefault();
    //   alert("Please Fill in all required Fields...");
    //   return;
    // }
    currentStep++;
    if (typeSelect.value === "home") {
      if (currentStep === 2) {
        showStep();
      } else if (currentStep === 4) {
        showStep();
        this.classList.add("hidden");
      }
    } else if (typeSelect.value === "organization") {
      if (currentStep === 3) {
        showStep();
      } else if (currentStep === 4) {
        showStep();
        this.classList.add("hidden");
      }
    }
  }); 


  submitbtn.classList.add("hidden");
  prevBtn.classList.add("hidden");
  prevBtn.addEventListener("click", function () {
    currentStep--;
    if (typeSelect.value === "home") {
      if (currentStep === 0) {
        currentStep = 1;
        showStep();
      } else if (currentStep === 1) {
        showStep();
      } else if (currentStep === 2) {
        currentStep = 2;
        showStep();
      }
    } else if (typeSelect.value === "organization") {
      if (currentStep === 1) {
        prevBtn.class.add("hidden");
      } else if (currentStep === 2) {
        showStep();
      } else if (currentStep === 3) {
        showStep();
      }
    }
  });

  function validateCurrentStep(){
    if (currentStep === 1){
      const firstName = document.getElementById("firstname").value.trim();

      if (!firstName) {
        return false;
      }
    }
    return true;
  }


//   function submitForm() {
//     var form = document.getElementById('myForm');
  
//     // Check if the hidden field is empty or not
//     var hiddenField = document.getElementById('hiddenField');
//     if (hiddenField.value.trim() !== '') {
//       // Perform form submission or other actions
//       console.log('Form submission successful!');
//     } else {
//       // Show the hidden field and display a message
//       hiddenField.classList.remove('hidden');
//       console.log('Please fill in all required fields.');
//     }
//   }

// console.log(document.getElementById('buttons').children.length);
});

console.log('lol');