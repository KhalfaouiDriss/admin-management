function newSection() {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(document.getElementById("New_Cat_form"));

    // Check if any fields are empty
    for (var pair of formData.entries()) {
        if (pair[1].trim() === '') {
            alert("Veuillez remplir tous les champs");
            return; // Stop form submission if any field is empty
        }
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Models/insert/newSection.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
            alert("Employee Added Successfully");
            window.location.reload(); // Reload the page after successful submission
        } else {
            console.error('Error occurred: ' + xhr.status);
        }
    };

    xhr.send(formData); // Send form data via AJAX
}
var timer;

function startTimer() {
  timer = setTimeout(function() {
    alert("Long press detected!");
  }, 1000); // Set the required time for considering the click as long (in milliseconds)
}

function checkLongClick() {
  clearTimeout(timer); // Cancel the timer if the click is released before the specified time
}