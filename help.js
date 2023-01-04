let pps = document.querySelectorAll(".number")
let oneN = document.querySelector(".one-n")
let twoN = document.querySelector(".two-n")
let threeN = document.querySelector(".three-n")
let fourN = document.querySelector(".four-n")
let fiveN = document.querySelector(".five-n")
let sixN = document.querySelector(".six-n")
let sevenN = document.querySelector(".seven-n")

let one = document.querySelector(".one"),
    two = document.querySelector(".two"),
    three = document.querySelector(".three"),
    four = document.querySelector(".four"),
    five = document.querySelector(".five"),
    six = document.querySelector(".six"),
    seven = document.querySelector(".seven")
console.log(seven)


oneN.addEventListener("click", () => {
    one.classList.toggle("hidden-active")
})
twoN.addEventListener("click", () => {
    two.classList.toggle("hidden-active")
})
threeN.addEventListener("click", () => {
    three.classList.toggle("hidden-active")
})

fourN.addEventListener("click", () => {
    four.classList.toggle("hidden-active")
})
fiveN.addEventListener("click", () => {
    five.classList.toggle("hidden-active")
})
sixN.addEventListener("click", () => {
    six.classList.toggle("hidden-active")
})

sevenN.addEventListener("click", () => {
    seven.classList.toggle("hidden-active")
})