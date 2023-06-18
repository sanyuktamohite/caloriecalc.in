document.getElementById('calculate').addEventListener('click', function() {
    var weight = document.getElementById('weight').value;
    var height = document.getElementById('height').value;
    var age = document.getElementById('age').value;
    var gender = document.getElementById('gender').value;
    var activity = document.getElementById('activity').value;

    var bmr;

    if (gender === 'male') {
        bmr = 66 + (13.75 * weight) + (5 * height) - (6.75 * age);
    } else {
        bmr = 655 + (9.56 * weight) + (1.85 * height) - (4.68 * age);
    }

    var calorieIntake = Math.round(bmr * activity);

    var resultElement = document.getElementById('result');
    resultElement.innerHTML = 'Your daily calorie intake: ' + calorieIntake + ' calories.';
});
