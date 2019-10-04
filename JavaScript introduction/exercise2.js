var aPerson = {name: "Elon Musk", age: 34, degrees: "Software Engineering, Computer Science, Commerce and Space Exploration"};
var betterPerson = {firstName: "Elon", lastName: "Musk", age: 34, degrees: "Software Engineering, Computer Science, Commerce and Space Exploration"};

var string1 = `Hi, my name is ${aPerson.name}, I am ${aPerson.age} years old and I have the following degrees: ${aPerson.degrees}.`;

var string2 = `Hello, my first name is ${betterPerson.firstName}. I also have a last name, it is ${betterPerson.lastName}. I am ${betterPerson.age} years old and I have these degrees: ${betterPerson.degrees}.`;
//console.log(aPerson);
console.log(string1);
console.log(string2);