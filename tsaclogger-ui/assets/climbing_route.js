import "./styles/route.css"

let myRating = document.getElementById("myRating");
let gradeSlider = document.getElementById("gradeSlider");
gradeSlider.value = 0;
calcGrade(gradeSlider.value);

function calcGrade(value) {
    let current = value - 1;
    
    if (current < 0) {
        myRating.innerHTML = '?';
    } else {
        let half = current/2;
        const lut = ['2', '3', '4', '5a', '5b', '5c', '6a', '6b', '6c', '7a', '7b', '7c', '8a', '8b', '9a'];
        let grade = lut[Math.floor(half)]
        grade = half - Math.floor(half) == 0 ? grade : grade.concat('+'); 
    
        myRating.innerHTML = grade;
    }
}

gradeSlider.oninput = function() {
    calcGrade(this.value);

} 