"use strict";

const applybuttons = document.querySelectorAll(".applybuttons");
const rejectbuttons = document.querySelectorAll(".rejectbuttons");
const applystatuses = document.querySelectorAll(".applystatuses");

for (let i = 0; i < applybuttons.length; i++) {
    applybuttons[i].addEventListener("click", function (e) {
        e.preventDefault();

        applybuttons[i].classList.add("hidden");
        rejectbuttons[i].classList.add("hidden");
        applystatuses[i].textContent = "Applied";
    });

    rejectbuttons[i].addEventListener("click", function (e) {
        e.preventDefault();

        applybuttons[i].classList.add("hidden");
        rejectbuttons[i].classList.add("hidden");
        applystatuses[i].textContent = "Rejected";
    });
}
