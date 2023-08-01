const signupBtn = document.getElementById("js_signup-btn");
const modal_bg = document.querySelector(".js_modal_bg");
const signupModal = document.getElementById("js_register");
const step1 = document.getElementById("js_step_first");

// signup modal を開く
signupBtn.addEventListener("click", () => {
  modal_bg.classList.remove("hidden");
  signupModal.style.display = "flex";
  step1.classList.remove("hidden");
});

// ============================ ステップ1 ==================================
const createBtn = document.getElementById("js_create-btn");
const step2 = document.getElementById("js_step_second");
const nextBtn1 = document.getElementById("js_nextBtn1");

createBtn.addEventListener("click", () => {
  step2.classList.remove("hidden");
  step1.classList.add("hidden");
});

// validation check
const inputName = document.getElementById("js_name_input");
const inputPhone = document.getElementById("js_phone_input");
const selectMonth = document.getElementById("js_month");
const selectDay = document.getElementById("js_day");
const selectYear = document.getElementById("js_year");

// 電話番号チェックで使うアラート文
const alert1 = document.getElementById("js_alert1");
const alert2 = document.getElementById("js_alert2");

let nameValue = "";
let phoneValue = "";
let yearValue = "";
let monthValue = "";
let dayValue = "";

document.addEventListener("input", (e) => {
  //input fieldに入力された値を取得する
  nameValue = inputName.value;
  phoneValue = inputPhone.value;
  yearValue = selectYear.value;
  monthValue = selectMonth.value;
  dayValue = selectDay.value;

  // 1. 電話番号のvalidayion check
  const phoneRegex = /^\d{10,11}$/;

  // 1. 1 電話番号のinput field に入力されたときに基づいてスタイルを変える
  inputPhone.addEventListener("input", (e) => {
    phoneValue = inputPhone.value;
    if (phoneRegex.test(phoneValue)) {
      alert1.classList.add("hidden");
      inputPhone.style.border = "1px solid rgba(0, 0, 0, 0.185)";
    } else if (phoneValue == "") {
      if (document.activeElement == inputPhone) {
        console.log("2");
        alert1.classList.add("hidden");
        inputPhone.style.border = "2px solid rgba(29, 161, 242)";
      }
    } else {
      alert1.classList.remove("hidden");
      inputPhone.style.outline = "none";
      inputPhone.style.border = "2px solid red";
    }
  });
  inputPhone.addEventListener("blur", () => {
    alert1.classList.add("hidden");
    inputPhone.style.border = "1px solid rgba(0, 0, 0, 0.185)";
  });
  inputPhone.addEventListener("focus", () => {
    alert1.classList.add("hidden");
    inputPhone.style.border = "2px solid rgba(29, 161, 242)";
  });

  //   2. 全てのinput fieldに値が入っているかチェック

  if (
    !(nameValue == "") &&
    !phoneValue == "" &&
    phoneRegex.test(phoneValue) &&
    !(yearValue == "Year") &&
    !(yearValue == "") &&
    !(monthValue == "Month") &&
    !(monthValue == "") &&
    !(dayValue == "Day") &&
    !(dayValue == "")
  ) {
    nextBtn1.style.pointerEvents = "auto";
    nextBtn1.style.backgroundColor = "black";
  } else {
    nextBtn1.style.pointerEvents = "none";
    nextBtn1.style.backgroundColor = "rgba(0, 0, 0, 0.637)";
  }
});



// ============================ ステップ2 ==================================
const step3 = document.getElementById("js_step_third");

nextBtn1.addEventListener("click", ()=>{
    step2.classList.add("hidden");
    step3.classList.remove("hidden")
})