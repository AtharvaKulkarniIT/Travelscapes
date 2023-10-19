document.addEventListener("DOMContentLoaded", function () {
    // Function to show the login and signup container
    function showLoginSignup() {
      const container = document.getElementById("container");
      container.style.display = "block"; // Show the container
    }
  
    // Set a timeout to call the function after 5 seconds
    setTimeout(showLoginSignup, 5000); // 5000 milliseconds = 5 seconds
  
    // Rest of your JavaScript code for handling login/signup toggling
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
  
    signUpButton.addEventListener('click', () =>
      container.classList.add('right-panel-active'));
  
    signInButton.addEventListener('click', () =>
      container.classList.remove('right-panel-active'));
  });
  