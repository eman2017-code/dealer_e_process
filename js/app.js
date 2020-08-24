// 1.Describe a way to execute some Javascript functionality without introducing any variables into the global namespace.
// * you could create a class in javascript that extends another class and just use the previous classess functions

// 2.Show/Describe how you would use a closure to replicate an object with a private property that is only exposed through a get/accessor method.

// 3.Write a function that takes one or more class names as a parameter and returns an array of strings,
//   where each string is the inner text content of an anchor tag in the current document that have any of the given classes.
// 4.Do the same but for anchor tags that contain ALL classes passed into the function.
function allAnchorTagClassNameTextContext(arrayOfClassNames) {
  const classNames = [".stopButton", ".startButton"];

  const allText = [];

  // iterate through each className
  for (let i = 0; i < arrayOfClassNames.length; i++) {
    let texts = $(`${arrayOfClassNames[i]}`).html();

    allText.push(texts);
  }

  return allText;
}

// 5. Write a function that takes a message and a number as parameters, and logs the message to the console every x seconds where x is the parameter number.
let interval;
let message = "something here";

function startLoggingMessage(message, number) {
  interval = setInterval(function () {
    console.log(message);
  }, number);

  return interval;
}

// 6.Implement an html button to be clicked to start and stop this logging sequence.
$(".startButton").on("click", function () {
  startLoggingMessage(message, 500);
});

$(".stopButton").on("click", function () {
  clearTimeout(interval);
});
