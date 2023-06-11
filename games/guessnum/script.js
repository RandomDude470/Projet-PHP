var targetNumber; // Variable to store the target number
var attempts; // Variable to store the number of attempts

// Function to start the game
function startGame() {
    targetNumber = Math.floor(Math.random() * 100) + 1; // Generate a random number between 1 and 100
    attempts = 0; // Reset the number of attempts

    // Reset the input field
    document.getElementById('guess').value = '';

    // Reset the result message
    document.getElementById('result').textContent = '';
}

// Check the player's guess
function checkGuess() {
    var guess = parseInt(document.getElementById('guess').value);
    var resultElement = document.getElementById('result');
    
    if (isNaN(guess) || guess < 1 || guess > 100) {
        resultElement.textContent = 'Please enter a valid number between 1 and 100.';
        return;
    }

    attempts++;

    if (guess === targetNumber) {
        resultElement.textContent = 'Congratulations! You guessed the correct number in ' + attempts + ' attempts.';
    } else if (guess < targetNumber) {
        resultElement.textContent = 'Too low. Try again.';
    } else {
        resultElement.textContent = 'Too high. Try again.';
    }
}

// Function to play again
function playAgain() {
    startGame();
}

// Start the game initially
startGame();
