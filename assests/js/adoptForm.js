console.log("Adoption form script loaded!");

const workElement = document.querySelector("#employment_status");
const workInput = document.querySelectorAll(".work_option");
const landLordSelector = document.querySelector("#own_or_rent");
const landlord = document.querySelectorAll(".landlord");
const vetSelector = document.querySelector("#veterinarain");
const vetInputs = document.querySelectorAll(".vet_details");

vetSelector.addEventListener("change", e => {
  let vet_assoc = e.target.value === "2";

  vetInputs.forEach(x => {
    if (vet_assoc && !x.hasAttribute("disabled", "")) {
      x.setAttribute("disabled", "");
    }
    if (!vet_assoc && x.hasAttribute("disabled", "")) {
      x.removeAttribute("disabled");
    }
  });
});

workElement.addEventListener("change", e => {
  let retired = e.target.value === "retired";

  workInput.forEach(x => {
    if (retired && !x.hasAttribute("disabled", "")) {
      x.setAttribute("disabled", "");
    }
    if (!retired && x.hasAttribute("disabled", "")) {
      x.removeAttribute("disabled");
    }
  });
});

landLordSelector.addEventListener("change", e => {
  let own = e.target.value === "1";

  landlord.forEach(ele => {
    if (own && !ele.hasAttribute("disabled")) {
      ele.setAttribute("disabled", "");
    }
    if (!own && ele.hasAttribute("disabled")) {
      ele.removeAttribute("disabled");
    }
  });
});
